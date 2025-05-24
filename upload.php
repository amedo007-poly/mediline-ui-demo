<?php
// Upload page: form and JS for prescription upload and OCR (mocked)
?>
<h2>Upload Prescription</h2>
<form id="upload-form" enctype="multipart/form-data">
    <input type="file" name="prescription" id="prescription" accept="image/*,.pdf" capture="environment" required>
    <button type="submit">Upload & Process</button>
</form>
<div id="ocr-result"></div>
<script>
document.getElementById('upload-form').onsubmit = function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('api/ocr.php', { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
            document.getElementById('ocr-result').innerHTML =
                '<h3>Extracted Medications:</h3>' +
                '<ul>' + data.meds.map(m => `<li>${m.name} (${m.dosage})</li>`).join('') + '</ul>';
        });
};
</script>
