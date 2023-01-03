<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<script>
    const logout = () => {
        window.location.href = "logout.php";
    }
    const getCurrentTimeDate = () => {
        let currentTimeDate = new Date();

        var weekday = new Array(7);
        weekday[0] = "Minggu";
        weekday[1] = "Senin";
        weekday[2] = "Selasa";
        weekday[3] = "Rabu";
        weekday[4] = "Kamis";
        weekday[5] = "Jum'at";
        weekday[6] = "Sabtu";
        
        var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Agu";
        month[8] = "Sep";
        month[9] = "Okt";
        month[10] = "Nov";
        month[11] = "Des";
        
        var seconds = currentTimeDate.getSeconds();

        var hours   =  currentTimeDate.getHours();

        var minutes =  currentTimeDate.getMinutes();
        minutes = minutes < 10 ? '0'+minutes : minutes;

         var AMPM = hours >= 12 ? 'PM' : 'AM';

        if(hours === 12){
            hours=12;

        }else{

            hours = hours%12;

        }

  

        // var currentTime = `${hours}:${minutes}:${seconds} ${AMPM}`;
        var currentDay = weekday[currentTimeDate.getDay()];

        var currentDate  = currentTimeDate.getDate();
        var currentMonth = month[currentTimeDate.getMonth()];
        var CurrentYear = currentTimeDate.getFullYear();

        var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;


        // document.getElementById("time").innerHTML = currentTime;
        document.getElementById("day").innerHTML = currentDay;
        document.getElementById("date").innerHTML = fullDate;
       

        
    


    }
    getCurrentTimeDate();

    window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		var hours = waktu.getHours();
		var minutes = waktu.getMinutes();
		var seconds = waktu.getSeconds();

        document.getElementById("time").innerHTML = `${hours}:${minutes}:${seconds}`;
	}
</script>