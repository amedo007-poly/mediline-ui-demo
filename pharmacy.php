<?php
// Pharmacy finder page (mocked)
?>
<h2>Find a Pharmacy</h2>
<div id="pharmacies"></div>
<script>
fetch('api/pharmacies.php').then(r=>r.json()).then(data=>{
    document.getElementById('pharmacies').innerHTML = '<ul>' +
        data.pharmacies.map(p => `<li>${p.name} - ${p.address} (${p.stock.join(', ')})</li>`).join('') + '</ul>';
});
</script>
