<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<script>
    const logout = () => {
        window.location.href="logout.php";
    }
    let target = document.getElementById("navbarText");
    target.addEventListener("click", () => {
    })
</script>