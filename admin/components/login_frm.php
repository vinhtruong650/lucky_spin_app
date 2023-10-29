
<div class="container-fluid d-flex">
        <form class="frm_login_admin" action="">
            <h2>Đăng nhập</h2>
            <div class="input_item">
                <label for="">Tài khoản</label><br>
                <input required name="us" type="text">
            </div>
            <div class="input_item">
                <label for="">Mật khẩu</label><br>
                <input required name="pass" type="password">
            </div>
            <div class="input_item">
            <button type="submit" name="btn_login" class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>
</div>
<style>
    .d-flex{
        display:flex;
        justify-content:center;
    }
    .frm_login_admin{
        color:black;
        border: 1px solid black;
        border-radius:10px;
        width: 50%;
        display: flex;
        flex-direction:column;
        align-items:center;
    }
    .input_item{
        margin: 10px 0;
    }
</style>