<script type="text/javascript">
$(function () {
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;

    config = {
        type: 'bar',
        
        data : {
                    labels: [
                    
                    <?php
                    for ($i=0; $i <= 6; $i++) {
                          $array[] = $this->pustaka->tanggal_indo_string_bulan_tahun(date("m-Y", strtotime("-" . $i . " months")));
                    }
                    foreach (array_reverse($array) as $item) {
                          echo '"'.$item.'",';
                     }
                     unset($array);
                    ?>
                    ],
                    datasets: [
                          {
                                label: "Kontrak",
                                fillColor: "rgba(220,220,220,0.2)",
                                strokeColor: "rgba(220,220,220,1)",
                                pointColor: "rgba(220,220,220,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data: [
                                <?php
                                for ($i=0; $i <= 6; $i++) {
                                      $bulan = explode('-', date("m-Y", strtotime("-" . $i . " months")))[0];
                                      $tahun = explode('-', date("m-Y", strtotime("-" . $i . " months")))[1];

                                      $array[] = $this->db->query("
                                            SELECT count(*) total
                                            FROM kontrak
                                            WHERE month(tgl_mulai_kontrak) = ?
                                            AND year(tgl_mulai_kontrak) = ?
                                      ", [$bulan, $tahun])->row()->total;             
                                }
                                foreach (array_reverse($array) as $item) {
                                      echo '"'.$item.'",';
                                 }
                                 unset($array);
                                ?>
                                ]
                          }
                    ]
              },

        options: {
            responsive: true,
            legend: false
        }
    }

    return config;
}
</script>