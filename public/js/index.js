console.log('hi');

import * as THREE from 'three';
import { MindARThree } from 'mindar-image-three';
import { loadGLTF } from "../libs/loader.js";

const buttonStart = document.getElementById('startButton');
const buttonStop = document.getElementById('stopButton');
const btnVertical = document.getElementById('turnVertical');
const btnHorizontal = document.getElementById('turnHorizontal');
const blockModelChanges = document.getElementById('ar-model-changes');
const productContainer = document.getElementById('product-container');
const header = document.getElementById('header');
const footer = document.getElementById('footer');
const arBlock = document.getElementById('ar-block');

const furnModelPath = document.querySelector('#ar-model').value;

// console.log(furnModelPath);

buttonStop.style.display = 'none';
arBlock.style.display = 'none';

const mindarThree = new MindARThree({
  container: document.body,
  imageTargetSrc: '../assets/targets/furn-target.mind',
  uiScanning: '#scanning',
  uiLoading: 'yes'
});

function startMindAR() {
  const start = async () => {
    const { renderer, scene, camera } = mindarThree;

    const light = new THREE.HemisphereLight(0xffffff, 0xbbbbff, 1);
    scene.add(light);
    const furnModel = await loadGLTF(furnModelPath);
    furnModel.scene.scale.set(0.1, 0.1, 0.1);
    furnModel.scene.position.set(0, -0.4, 0);
    // console.log(furnModel);

    const furnModelAnchor = mindarThree.addAnchor(0);
    furnModelAnchor.group.add(furnModel.scene);

    await mindarThree.start();
    renderer.setAnimationLoop(() => {
      renderer.render(scene, camera);
    });

    const rangeInput = document.getElementById('sizeRange');
    rangeInput.addEventListener('input', () => {
      const scaleValue = rangeInput.value;
      furnModel.scene.scale.set(scaleValue, scaleValue, scaleValue);
    });

    btnVertical.addEventListener('click', () => {
      furnModel.scene.rotation.x += Math.PI / 2;
    });

    btnHorizontal.addEventListener('click', () => {
      furnModel.scene.rotation.y += Math.PI / 2;
    });
  }
  start();
}

document.addEventListener('DOMContentLoaded', () => {
  buttonStart.addEventListener('click', () => {
    startMindAR();

    header.style.display = 'none';
    footer.style.display = 'none';
    productContainer.style.display = 'none';
    arBlock.style.display = 'block';

    blockModelChanges.style.display = 'block';
    buttonStart.style.display = 'none';
    buttonStop.style.display = 'block';
  });

  buttonStop.addEventListener('click', () => {
    mindarThree.stop();

    header.style.display = 'block';
    footer.style.display = 'block';
    productContainer.style.display = 'block';
    arBlock.style.display = 'none';

    blockModelChanges.style.display = 'none';
    buttonStop.style.display = 'none';
    buttonStart.style.display = 'block';
  });
});

// Attach event listeners to buttons
document.querySelectorAll('.add-to-favorites').forEach(button => {
    button.addEventListener('click', function(event) {
        var user_id = this.getAttribute('data-user-id'); // Get user ID from data attribute
        var product_id = this.getAttribute('data-product-id'); // Get product ID from data attribute
        addToFavorites(user_id, product_id);
    });
});

// Function to send a fetch request
function addToFavorites(user_id, product_id) {
    fetch('/api/v1/favorites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            // Add Laravel CSRF token here
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },

        body: JSON.stringify({
            user_id: user_id,
            product_id: product_id
        })
    })

    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });
    console.log(fetch);
}
