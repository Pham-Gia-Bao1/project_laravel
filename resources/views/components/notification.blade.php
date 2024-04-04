<style>
   .notification {
    position: fixed;
    top: 100px;
    right: 10px;
    padding: 10px;
    border-radius: 5px;
    z-index: 100;
    opacity: 0; /* Không hiển thị ban đầu */
    transition: opacity 0.5s ease; /* Hiệu ứng transition cho opacity */
    padding: 20px;
}

.success {
    background-color: rgb(23, 225, 60);
}

.error {
    background-color: rgb(255, 104, 50) !important;
}

</style>

@if (session('error'))
<div class="error notification" id="errorNotification">
    {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="success notification" id="successNotification">
    {{ session('success') }}
</div>
@endif

@if (session('message'))
<div class="success notification" id="messageNotification">
    {{ session('message') }}
</div>
@endif

@if (Session::has('info'))
<div class="error notification" id="infoNotification">
    {{ Session('info') }}
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var errorNotification = document.getElementById('errorNotification');
    var successNotification = document.getElementById('successNotification');
    var messageNotification = document.getElementById('messageNotification');
    var infoNotification = document.getElementById('infoNotification');

    // Hiển thị thông báo
    function showNotification(notification) {
        notification.style.opacity = '1'; // Set opacity to 1 để hiển thị
        setTimeout(function() {
            hideNotification(notification); // Ẩn thông báo sau 3 giây
        }, 3000);
    }

    // Ẩn thông báo
    function hideNotification(notification) {
        notification.style.opacity = '0'; // Set opacity to 0 để ẩn
        setTimeout(function() {
            notification.style.display = 'none'; // Sau khi ẩn, ẩn đi luôn
        }, 3000); // Thời gian phải lớn hơn thời gian transition trong CSS
    }

    // Xác định thông báo và hiển thị
    if (errorNotification) {
        showNotification(errorNotification);
    }
    if (successNotification) {
        showNotification(successNotification);
    }
    if (messageNotification) {
        showNotification(messageNotification);
    }
    if (infoNotification) {
        showNotification(infoNotification);
    }
});

</script>
