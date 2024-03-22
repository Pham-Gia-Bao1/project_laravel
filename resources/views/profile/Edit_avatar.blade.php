
@extends('profile.Profile')
@section('content-profile')
<style>
form{
    position: relative;
}
#label_input_avatar{
    position: absolute;
    right: 10%;
    font-size: 40px;
    cursor: pointer;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    border-radius:50%;
    width: 40px;
    height: 40px;
    background-color: white;
    text-align: center;

}

.cookiesContent {
  width: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;
  button.close {
    width: 30px;
    font-size: 20px;
    color: #c0c5cb;
    align-self: flex-end;
    background-color: transparent;
    border: none;
    margin-bottom: 10px;
  }
  img {
    width: 82px;
    margin-bottom: 15px;
  }
  p {
    margin-bottom: 40px;
    font-size: 18px;
  }
  .accept {
    background-color: #f7d23f;
    border: none;
    border-radius: 5px;
    width: 200px;
    padding: 14px;
    font-size: 16px;
    color: white;
    box-shadow: 0px 6px 18px -5px rgb(230, 212, 50);
  }
}
#input_avatar{
    display: none;
}
.cookiesContent img{
    width: 100%;
}

    .notification{
        width: 30%;
        background-color: rgb(23, 225, 60);
        position: absolute;
        right: 10px;
        padding: 30px;
        display: block;
        position: fixed;
        border-radius: 5px;
    }
</style>
<script>
   setTimeout(function(){
       document.getElementById('notification').style.display = 'none';
   },4000)
</script>
<a href="profile">
    <img
        src="./assets/icons/arrow-left.svg"
        alt=""
        class="icon cart-info__back-arrow"
    />
</a>
<form  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container1">
        <div class="cookiesContent" id="cookiesPopup">

            <img id="avatarPreview" src="./assets/img/avatar/{{ Auth::user()->img }}" />
            <p>Change your avatar anytime you want</p>

            <!-- Thêm thuộc tính "name" để biến này được gửi đi qua form -->
            <label for="input_avatar" id="label_input_avatar">+</label>
            <input type="file" name="avatar" id="input_avatar">

            <button type="submit" class="accept">Save</button>
        </div>
    </div>
</form>

<script>
    // Lắng nghe sự kiện khi người dùng chọn file
    document.getElementById('input_avatar').addEventListener('change', function(event) {
        // Lấy đối tượng file từ sự kiện
        const file = event.target.files[0];

        // Tạo đường dẫn URL tạm thời cho file đã chọn
        const imageURL = URL.createObjectURL(file);

        // Hiển thị hình ảnh được chọn lên trang
        const avatarPreview = document.getElementById('avatarPreview');
        avatarPreview.src = imageURL;

        // Giải phóng đường dẫn URL khi không cần thiết nữa (để tránh rò rỉ bộ nhớ)
        avatarPreview.onload = function() {
            URL.revokeObjectURL(this.src);
        }
    });
</script>
@if (session('message'))
    <h1 class="notification" id="notification">{{session('message')}}</h1>
@endif
@endsection




