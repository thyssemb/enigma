document.getElementById('algo').addEventListener('change', function() {
    const keyContainer = document.getElementById('key-container');
    const selectedAlgo = this.value;

    if (selectedAlgo === 'cesar' || selectedAlgo === 'vigenere' || selectedAlgo === 'masque_jetable') {
        keyContainer.style.display = 'block';
    } else {
        keyContainer.style.display = 'none';
    }
});
