<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
</head>
<body>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                </button>
                <a href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
        
                        <li><a href="logout.php"></i> Keluar</a></li>
    <h1 class="page-header">TOKO <small>ABC</small></h1>
                    </div>
                </div>
				<?php
						include ('db.php');
						$sql = "select * from roombook";
						$re = mysqli_query($con,$sql);
						$c =0;
						while($row=mysqli_fetch_array($re) )
						{
								$new = $row['stat'];
								$cin = $row['cin'];
								$id = $row['id'];
								if($new=="Not Conform")
								{
									$c = $c + 1;
									
								
								}
						
						}
				?>
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <button class="btn btn-default" type="button">Barang dipesan  <span class="badge"><?php echo $c ; ?></span></button></a>
                                </h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
											<th>Jumlah</th>
											<th>Produk</th>
											<th>Beli</th>
											<th>Status</th>
											<th>Selengkapnya</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$tsql = "select * from roombook";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
										$co =$trow['stat']; 
										if($co=="Not Conform")
										{
											echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['FName']." ".$trow['LName']."</th>
												<th>".$trow['Email']."</th>
												<th>".$trow['Country']."</th>
												<th>".$trow['TRoom']."</th>
												<th>".$trow['Bed']."</th>
												<th>".$trow['Meal']."</th>
												<th>".$trow['cin']."</th>
												<th>".$trow['cout']."</th>
												<th>".$trow['stat']."</th>
												
												<th><a href='roombook.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
												</tr>";}}?>
                                    </tbody>
                                </table>
								<?php
								
								$rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$r =0;
								while($row=mysqli_fetch_array($rre) )
								{$br = $row['stat'];
                                if($br=="Conform")
                                {$r = $r + 1;}
								}
								?>
                                <button class="btn btn-primary" type="button">
                                Barang dipesan  <span class="badge"><?php echo $r ; ?></span>
                                </button>
                                <?php
                                $msql = "SELECT * FROM `roombook`";
                                $mre = mysqli_query($con,$msql);
                                while($mrow=mysqli_fetch_array($mre) )
                                {$br = $mrow['stat'];
                                if($br=="Conform")
                                {$fid = $mrow['id'];}
                                ?>
                                <?php
								
								$fsql = "SELECT * FROM `contact`";
								$fre = mysqli_query($con,$fsql);
								$f =0;
								while($row=mysqli_fetch_array($fre) )
								{
										$f = $f + 1;
								
								}
						
								?>
        <tbody>
            <?php
                $csql = "select * from contact";
                $cre = mysqli_query($con,$csql);
                while($crow=mysqli_fetch_array($cre) )
									{
									echo"<tr>
                                        <th>".$crow['id']."</th>
                                        <th>".$crow['fullname']."</th>
                                        <th>".$crow['email']." </th>
                                        <th>".$crow['cdate']." </th>
                                        <th>".$crow['approval']."</th>
                                        </tr>";
									}
                                ?>
        </tbody>
    </table>
<a href="messages.php" class="btn btn-primary">Selanjutnya<a>
</body>
</html>
