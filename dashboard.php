<?php
// Dashboard page: shows history, notifications, refills (mocked)
?>
<h2>Your Dashboard</h2>
<div id="history"></div>
<div id="notifications"></div>
<script>
fetch('api/history.php').then(r=>r.json()).then(data=>{
    document.getElementById('history').innerHTML = '<h3>Prescription History</h3>' +
        '<ul>' + data.history.map(h => `<li>${h.date}: ${h.meds.join(', ')} (${h.status})</li>`).join('') + '</ul>';
});
fetch('api/notifications.php').then(r=>r.json()).then(data=>{
    document.getElementById('notifications').innerHTML = '<h3>Notifications</h3>' +
        '<ul>' + data.notifications.map(n => `<li>${n.title}: ${n.message}</li>`).join('') + '</ul>';
});
</script>
