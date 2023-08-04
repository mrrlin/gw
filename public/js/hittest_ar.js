import * as THREE from 'three';
import { loadGLTF } from "../libs/loader.js";
import { ARButton } from '../libs/three.js-r132/examples/jsm/webxr/ARButton.js';
import { TransformControls } from '../libs/three.js-r132/examples/jsm/controls/TransformControls.js'; // Import TransformControls

const furnModelPath = document.querySelector('#ar-model').value;

const header = document.getElementById('header');
const footer = document.getElementById('footer');
const productContainer = document.getElementById('product-container');

// Touch event variables
let pinchStartDistance = null;
let pinchEndDistance = null;
let initialModelScale = null;

document.addEventListener('DOMContentLoaded', () => {
    const initialize = async() => {
      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera();

      const light = new THREE.HemisphereLight( 0xffffff, 0xbbbbff, 1 );
      scene.add(light);

      let furnModel;
      let modelPlaced = false;

      const renderer = new THREE.WebGLRenderer({antialias: true, alpha: true});
      renderer.setPixelRatio(window.devicePixelRatio);
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.xr.enabled = true;

      const arButton = ARButton.createButton(renderer, {requiredFeatures: ['hit-test'], optionalFeatures: ['dom-overlay'], domOverlay: {root: document.body}});
      document.body.appendChild(renderer.domElement);
      document.body.appendChild(arButton);

      const controller = renderer.xr.getController(0);
      scene.add(controller);

      const controls = new TransformControls(camera, renderer.domElement);
      controls.addEventListener('objectChange', function () {
        if (furnModel) {
          modelPlaced = false;
        }
      });

      const gltf = await loadGLTF(furnModelPath);
      furnModel = gltf.scene;
      furnModel.matrixAutoUpdate = false;
      furnModel.visible = true;
      furnModel.traverse( child => {
        if ( child.isMesh ) {
          child.material.transparent = true;
          child.material.opacity = 0.5;
        }
      });
      scene.add(furnModel);
      controls.attach(furnModel);
      scene.add(controls);

      controller.addEventListener('select', () => {
        if (furnModel && !modelPlaced) {
          furnModel.traverse( child => {
            if ( child.isMesh ) {
              child.material.transparent = false;
              child.material.opacity = 1.0;
            }
          });
          modelPlaced = true;
          controls.detach(furnModel);
        }
      });

      renderer.xr.addEventListener("sessionstart", async (e) => {
        const session = renderer.xr.getSession();
        const viewerReferenceSpace = await session.requestReferenceSpace("viewer");
        const hitTestSource = await session.requestHitTestSource({space: viewerReferenceSpace});

        // console.log('session start');

        header.style.display = "none";
        footer.style.display = "none";
        productContainer.style.display = "none";

        renderer.setAnimationLoop((timestamp, frame) => {
        if (!frame) return;

        const hitTestResults = frame.getHitTestResults(hitTestSource);

        if (!modelPlaced && hitTestResults.length && furnModel) {
            const hit = hitTestResults[0];
            const referenceSpace = renderer.xr.getReferenceSpace();
            const hitPose = hit.getPose(referenceSpace);

            furnModel.matrix.fromArray(hitPose.transform.matrix);
        }

        renderer.render(scene, camera);
        });
      });

      renderer.xr.addEventListener("sessionend", () => {
        header.style.display = "block";
        footer.style.display = "block";
        productContainer.style.display = "block";

        console.log("session end");
      });
    }

    initialize();
});

document.addEventListener("touchstart", function(event) {
    if (event.touches.length == 2) {
        pinchStartDistance = getPinchDistance(event);
        initialModelScale = furnModel.scale.clone();
    }
}, false);

document.addEventListener("touchmove", function(event) {
    if (event.touches.length == 2 && pinchStartDistance) {
        pinchEndDistance = getPinchDistance(event);

        const scale = pinchEndDistance / pinchStartDistance;

        furnModel.scale.x = initialModelScale.x * scale;
        furnModel.scale.y = initialModelScale.y * scale;
        furnModel.scale.z = initialModelScale.z * scale;
    }
}, false);

document.addEventListener("touchend", function(event) {
    if (event.touches.length < 2) {
        pinchStartDistance = null;
        pinchEndDistance = null;
        initialModelScale = null;
    }
}, false);

function getPinchDistance(event) {
    const dx = event.touches[0].clientX - event.touches[1].clientX;
    const dy = event.touches[0].clientY - event.touches[1].clientY;
    return Math.sqrt(dx * dx + dy * dy);
}
