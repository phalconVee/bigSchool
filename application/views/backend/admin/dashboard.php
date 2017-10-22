<hr />

<div class="row">
    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-red">

            <div class="icon"><i class="fa fa-group"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('student');?>"
                 data-postfix="" data-duration="1500" data-delay="0">0</div>

            <h3><?php echo get_phrase('student');?></h3>
            <p>Total students</p>

        </div>

    </div>

    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-users"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('teacher');?>"
                 data-postfix="" data-duration="800" data-delay="0">0</div>

            <h3><?php echo get_phrase('teacher');?></h3>
            <p>Total teachers</p>
        </div>

    </div>

    <div class="clear visible-xs"></div>

    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-user"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('parent');?>"
                 data-postfix="" data-duration="500" data-delay="0">0</div>

            <h3><?php echo get_phrase('parent');?></h3>
            <p>Total parents</p>
        </div>

    </div>

    <div class="col-sm-3 col-xs-6">

        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <?php
            $check	=	array(	'timestamp' => strtotime(date('Y-m-d')) , 'status' => '1' );
            $query = $this->db->get_where('attendance' , $check);
            $present_today		=	$query->num_rows();
            ?>
            <div class="num" data-start="0" data-end="<?php echo $present_today;?>"
                 data-postfix="" data-duration="500" data-delay="0">0</div>

            <h3><?php echo get_phrase('attendance');?></h3>
            <p>Total present student today</p>
        </div>

    </div>
</div>

<br />

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <!-- ATTENDANCE-->
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-chart"></i>
                            <?php echo get_phrase('daily_attendance_overview');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">

                        <div id="demoLegend"> </div>
                        <canvas id="mycanvas" width="600" height="300"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="col-md-4">
		<div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Latest News Feed</div>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>S/n</th>
                        <th>Title</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php $i= 0; foreach($notices as $notice): ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$notice['notice_title']?></td>
                        <td><?=date('d M, Y', $notice['create_timestamp']);?></td>
                    </tr>
                    <?php endforeach;?>

                    </tbody>
                </table>

            </div>

            <div>
                <center><a href="<?=base_url('index.php?admin/noticeboard')?>" class="btn btn-primary btn-sm">View More</a></center>
            </div>

            <br>

    	</div>

        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Birthday Today</div>
                </div>

                    <div class="table-responsive">
                        <table class="table table-xlg text-nowrap">
                            <tbody>
                            <tr>
                                <td class="col-md-4">
                                    <div class="media-left media-middle">
                                        <a href="" style="color: pink;"><i class="fa fa-birthday-cake" style="font-size:48px; "></i></a>
                                    </div>

                                    <div class="media-left ">
                                        <h4>
                                            <b><center>0</b></center><small class="display-block no-margin">Students have birthday today</small>
                                        </h4>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

    </div>

</div>

<br />

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            <?php echo get_phrase('events_schedule');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
  $(document).ready(function() {
	  
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 250,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
						},
						<?php 
						endforeach
						?>
						
					]
				});
	});
</script>

<!--
<script>
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url();?>index.php?admin/bar_graph",
            method: "GET",
            success: function(data) {
                console.log(data);
                var day = [];
                var status = [];

                for(var i in data) {

                    var tr = data[i].timestamp;

                    var dateTime = new Date(tr*1000);
                    var formatted = dateTime.toDateString();

                    day.push("Date " + formatted);
                    status.push(data[i].status);
                }

                var barChartData = {
                    labels: day,
                    datasets : [
                        {
                            label: 'Attendance Status',
                            fillColor : "rgba(220,220,220,0.5)",
                            strokeColor : "rgba(220,220,220,0.8)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: status
                        }
                    ]
                };

                var ctx = $("#mycanvas")

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    responsive : true,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

</script>-->

<!--
<script>

    $.ajax({
        type: 'POST',
        url: "<?php echo base_url();?>index.php?admin/bar_graph",
        success: function (data) {

            var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

            var day = [];
            var status = [];

            for(var i in data) {

                var tr = data[i].timestamp;

                var dateTime = new Date(tr*1000);
                var formatted = dateTime.toDateString();

                day.push(" " + formatted);
                status.push(data[i].status);
            }


            var barChartData = {
                labels : day,
                datasets : [
                    {
                        fillColor : "rgba(151,187,205,0.5)",
                        strokeColor : "rgba(151,187,205,0.8)",
                        highlightFill : "rgba(151,187,205,0.75)",
                        highlightStroke : "rgba(151,187,205,1)",
                        data : status
                    }
                ]

            }
            window.onload = function(){
                var ctx = document.getElementById("mycanvas").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                    responsive : true
                });
            }


        }
    });

</script>-->


<script type="text/javascript">
    $(document).ready(function(){

        var data = {
            labels: <?php echo $label; ?>,
            datasets: [
                {
                    label: "Attendance Status:" + <?php echo $result1;?>,
                    fillColor: 	"rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor:  "rgba(151,187,205,1)",
                    pointStrokeColor: "#FFF",
                    pointHighlightFill: "#FFF",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: <?php echo $result1; ?>
                }

            ]
        };

        var ctx = document.getElementById("mycanvas").getContext("2d");
        new Chart(ctx).Line(data, {
            responsive: true, maintainAspectRatio: true

        });

        //document.getElementById("demoLegend").innerHTML = chart.generateLegend();
    });
</script>