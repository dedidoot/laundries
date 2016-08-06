<?php
//session_start();
	include "../koneksi.php";
	$sql = "SELECT adm.nama_laundry, nt.id_laundry, COUNT(nt.id_laundry) AS qty FROM nota nt
			JOIN admin_laundry adm ON adm.id_laundry=nt.id_laundry WHERE nt.status='y' 
			GROUP BY nt.id_laundry";	
    $hasil = mysql_query($sql);
?>

<html>
   <head>
      <script src="jquery-1.9.1.min.js"></script>
      <script src="highcharts.js"></script>
      <script src="exporting.js"></script>
   
    <script type="text/javascript">
       $(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false,
        },
        title: {
            text: 'Persentase Tempat Laundry Yang Paling Produktif'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Jumlah',
            data: [
			<?php
			
			while($data=mysql_fetch_array($hasil))
			{ ?>
                ['<?php echo $data[nama_laundry]?>',   <?php echo $data[qty]?>],
                
		   <?php
		   }//end while
		   ?>
            ]
        }]
    });
});


    
    
    
    </script> 
   
   </head>

<body>
   <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


</body>

</html>