<?php error_reporting(0);?>
<?php
include('conf.php');
if(!empty($_GET))
{
  $id  = $_GET['id'];
    $sql = "SELECT * FROM property where id = '".$id."'";
  $result = $conn->query($sql);
}


$query = "SELECT * FROM rate_card";
$query_resr = $conn->query($query);
$rate_renew = $query_resr->fetch_object();

  $built_total = array(

    'a' => $rate_renew->e,
    'b' => $rate_renew->f,
    'c' => $rate_renew->g,
    'd' => $rate_renew->h,
  );
  
  $open_plot = array(
    'a' => $rate_renew->i,
    'b' => $rate_renew->j,
    'c' => $rate_renew->k,
    'd' => $rate_renew->l,
  );

  $struc_array = array(

    'a' => 'अ.',
    'b' => 'ब.',
    'c' => 'क.',
    'd' => 'ड.',
  );

  $use_array = array(

    'RESIDENTIAL' => 'अ.निवासि',
    'COMMERCIAL' => 'ब.व्यवसाईक',
    'INDUSTRIAL' => 'क.औद्योगिक',
    'PUBLIC' => 'ड. सार्वजनिक',
    'SEMIPUBLIC' => 'ई. निम-सार्वजनिक',
    'OPENPLOT' => 'फ. खुला भुखंड',
  );

  $water_conn = array(

    'etc' => 'इतर',
    'well' => 'विहिर',
    'pump' => 'हात पंप',
    'water_conn' => 'नळ',
    'public_conn' => 'सार्वजनिक नळ',
  );
  $saoch_conn = array(

    'saoch_conn' => 'होय',
    'saoch_conn2' => 'नाही',
  );
$water_conn_tax = 360.00;
  ?>


        
  <!doctype html>
  <html lang=''>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>गाव नमुना - ८ (असेसमेंट लिस्ट)</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="tableToExcel.js "></script>
   

  </head>

  <body>

    <div class="main">
        
        <?php
        $query = "SELECT * FROM rate_card";
        $query_resr = $conn->query($query);
        $rate_renew = $query_resr->fetch_object();
        
        //print_r($rate_renew->vpani);
        ?>
        
<!--<div style="float:right;position: absolute; right: 100px;"><button style="background: #7a7ada;
    border: none;padding: 5px;" class="print_btn">Print</button></div>-->
    <?php
    while($row = $result->fetch_object())
    {

  //echo '<pre>'.print_r($row,true).'</pre>';
      $id = $row->id;
      $sq = "SELECT * FROM property_details where prop_id = ".$id;
      $res = $conn->query($sq);
      while ($r = $res->fetch_object()) {
  // echo '<pre>'.print_r($r,true).'</pre>';
    //$struct[$r->prop_stru] = $r->prop_stru;
        $prop_stru[$r->id] = $struc_array[$r->prop_stru];
        $prop_use[$r->id] = $use_array[$r->prop_use];
        $prop_age[$r->id] = $r->prop_age;
        //echo $builtup_total[$r->id] = $r->builtup_total;
      }
      ?>
      <link rel="stylesheet" href="style.css">
      <div  id="printdiv" style="padding-top:25px;">
        <style>
        @media print {
          @page 
          {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
          }

          .Footer { display:none; }
        } 
        .main
        {
          color:#000;
          margin:0px auto;
          text-align:center;width:1200px;
          /*height:770px;border:1px dotted #000;*/
        }

        .main #t
        {
          margin-left:10px;
          text-align:center;
          width:1000px;
          border:1px #fff solid;

        }
        #Selection
        {
          /*margin:3px 5px 3px 5px;*/
          border:1px #00f solid;
          margin:3px auto;
          text-align:justify;
        }
        #Selection p
        {
          text-align:left;
          margin-left:10px;
        }
        #testTable
        {
          /*margin:3px 5px 3px 5px;*/
          padding:1px;
          border:1px #ccc solid;
          /*  width:950px;*/
          margin:3px auto;
          font-size:12px;
        }
        #testTable p { line-height:12px;}

        #header_row 
        {
          color:#fff;
          background:#000;
          border:1px #ccc solid;
        }
        #data_row 
        {
          color:#000;
          background:#fff;
          border:1px #f00 solid;
          font-size:12px;
        }
        .t3
        {
          margin-bottom:0px;
          padding:5px;
          background:#000;
          position:fixed;
          height:75px;
          width:100%;
          text-align:center;
          color:#FFFFFF;
          text-decoration:none;
          padding-top:25px;
        }
        .table1
        {
          width:100%;
          margin:0px auto;
          font-size:12px;
        }
        .table1 td
        {
          border:1px #000 solid;
          color:#333;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
      </style>
      <div class="main">
        <link rel="stylesheet" href="css/style.css">
        <?php
        $query = "SELECT * FROM gram_detail";
        $query_res = $conn->query($query);
        $gram_res = $query_res->fetch_object();
        ?>
        <div align="center" style="font-size:14px;padding-bottom:5px;">&nbsp;<strong>गट ग्रामपंचायत <?php echo $gram_res->gram_name; ?></strong> &nbsp;</div>
        <div align="center" style="font-size:14px;">&nbsp;पंचायत समिती - <?php echo $gram_res->pan_samiti; ?>, त.- <?php echo $gram_res->tahsil; ?>, जिल्हा - <?php echo $gram_res->district; ?>&nbsp;</div>
        <div align="center" style="font-size:14px;">&nbsp;ग्रामपंचायत क्षेत्रातील जमिनी व इमारती वरील कर आकारणी करिता शासन अधिसूचना क्र व्हीपीएम २०१५ / प्र. क्र. १४० / पंरा - ४ (२२) दि. ३१/१२/२०१५ महाराष्ट्र ग्रामपंचायत कर व फी नियम २०१५ च्या आधारे कर आकारणी &nbsp;</div>
        <div align="center" style="font-size:14px;">&nbsp;सन २०२३-२०२४   सालासाठी करास पात्र असलेल्या इमारती व जामिनी यांची आकारणी यादी ( असेसमेंट लिस्ट )&nbsp;</div>
       

<!-- new -->
        <table class="table1">
          <tbody style="border-bottom: 1px #000 solid: ">
            <tr height="12px">
              <td rowspan="2" width="30px" align="center">&nbsp;अनु. क्र.&nbsp;</td>
              <td colspan="3" width="80px" align="center">&nbsp;रस्ता, विभाग किंवा मंडळाचे नाव&nbsp;</td>
              <td width="40px" align="left">&nbsp; मालकाचे नाव&nbsp;</td>              
              <td align="left" width="400px">&nbsp;<strong style="font-size: 15px;"><?php echo $row->owner_name; ?></strong>&nbsp;</td>
            </tr>
            <tr>
              <td width="40px" align="center">&nbsp;खसरा क्र.&nbsp;</td>
              <td width="40px" align="center">&nbsp;वार्ड क्र.&nbsp;</td>
              <td width="40px" align="center">&nbsp;मालमत्ता क्र.&nbsp;</td>
              <td width="100px" align="left">&nbsp; पत्नीचे नाव&nbsp;</td>
              <td align="left">&nbsp;<?php echo $row->owner_wife; ?>&nbsp;</td>
            </tr>
            <tr>
              <td rowspan="4" valign="middle">&nbsp;<?php echo $row->anukra; ?> &nbsp;</td>
              <td rowspan="4"align="center">&nbsp;<?php echo $row->khasra; ?> &nbsp;</td>
              <td rowspan="4" align="center">&nbsp;<?php echo $row->ward; ?> &nbsp;</td>
              <td rowspan="4" align="center">&nbsp;<?php echo $row->plot_no; ?>&nbsp;</td>
              <td align="left" width="100px">&nbsp; भोगवटादाराचे नाव&nbsp;</td>
              <td align="left">&nbsp;<?php echo $row->rentee_name; ?> &nbsp;</td>
            </tr>
              <tr>
             <td align="left" width="100px">&nbsp; मोबाइल नं. &nbsp;</td>
              <td align="left">&nbsp;<?php echo $row->mobile_no; ?> &nbsp;</td>    
              
            </tr>
              <tr>
             <td align="left" width="100px">&nbsp; पूर्ण पत्ता&nbsp;</td>
              <td align="left">&nbsp;<?php echo $row->owner_address; ?> &nbsp;</td>    
              
            </tr>
            
          </tbody>
        </table>
        <!-- new -->   
<table class="table1">
         <tbody>
          <tr height="12px">
            <td width="60px" align="center">&nbsp;अ&nbsp;</td>
            <td width="270px" align="center">&nbsp;झोपडी किंवा विटा वापर मातीची इमारत&nbsp;</td>
            <td width="60px" align="center">&nbsp;ब&nbsp;</td>
            <td width="350px" align="center">&nbsp;दगड किंवा विटा वापर मातीची इमारत&nbsp;</td>
            <td width="60px" align="center">&nbsp;क&nbsp;</td>
            <td colspan="3" width="400px" align="center">&nbsp;दगड,विटांची व चुना किंवा सिमेंट वापरुन उभारलेली इमारत</td>
          </tr>
          <tr>


                                          <?php
              $poss_type = array(
              'OFFICIAL' => 'अधिकृत',
              'UNOFFICIAL' => 'अनधिकृत',
              'IMLAKAR' => 'इमलाकर',
              'INDIRA' => 'इंदिरा आवास',
            );
                  ?>
            <td width="60px" align="center">&nbsp;ड&nbsp;</td>
            <td width="270px" align="center">&nbsp;आर.सी.सी.पध्दतीची इमारत&nbsp;</td>
            <td width="60px" align="center">&nbsp;इ&nbsp;</td>
            <td width="350px" align="center">&nbsp;खाली जागा&nbsp;</td>
            <!--<td width="200px" align="center">&nbsp;<?php echo $poss_type[$row->poss_type]; ?>&nbsp;</td>-->
            <td width="60px" align="center">&nbsp;शौचालय&nbsp;</td>
                                           <?php 
            $saoch = json_decode($row->saoch);
             ?>
            <td width="204px" align="center">&nbsp;<?php foreach ($saoch as $key => $value) {
              echo $saoch_conn[$key].'  ';
            } ?>&nbsp;</td>
            <td width="180px" align="center">&nbsp;पिण्याच्या पाण्याची व्यवस्था&nbsp;</td>
                                           <?php 
            $water = json_decode($row->water);
             ?>
            <td width="204px" align="center">&nbsp;<?php foreach ($water as $key => $value) {
              echo $water_conn[$key].' , ';
            } ?>&nbsp;</td>
            
          </tr>
        </tbody>
      </table>

<!-- second -->


<!-- Thired -->


                        <table class="table1">
         <tbody>
          <tr>
            <td width="64px" align="center">&nbsp;इमा. स्व.&nbsp;</td>
            <td width="295px" align="center">&nbsp;इमा. क्षेत्रफळ (चौ.फुट.) &nbsp;</td>
            <td width="290px" align="center">&nbsp;रेडीरेकनर नुसार इमा. वार्षिक मुल्य (दर प्रती. चौ. मी. रू.)&nbsp;</td>
            <td width="215px" align="center">&nbsp;घसारा&nbsp;</td>
            <td width="195px" align="center">&nbsp;इमा. वाप. भारांक&nbsp;</td>
            <td width="220px" align="center">&nbsp;इमा. भांडवली मुल्य&nbsp;</td>
          </tr>

<?php 
$sq2 = "SELECT * FROM property_details where prop_id = ".$id;
  $res2 = $conn->query($sq); 
  while ($r2 = $res2->fetch_object()) {
  //echo '<pre>'.print_r($r2,true).'</pre>';
    //$ttdisplay = $r2->builtup_total[];
    $prop_stru[$r2->id] = $struc_array[$r2->prop_stru];
                $prop_floor[$r2->id] = $r2->prop_floor;
    $prop_use[$r2->id] = $use_array[$r2->prop_use];
    $prop_age[$r2->id] = $r2->prop_age;
    $builtarea_pp[$r2->id] = $r2->builtarea_pp;
                $builtarea_ud[$r2->id] = $r2->builtarea_ud;
//$builtarea_total = $builtarea_pp[$r2->id] * $builtarea_ud[$r2->id];
$builtarea_total = $r2->builtup_total;


                                                 if($r2->prop_age >= 0 && $r2->prop_age <=2)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 1.00;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 1.00;
                                                    }
            } 
            if($r2->prop_age >2 && $r2->prop_age <=5)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.95;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.95;
                                                    }
            }
            if($r2->prop_age > 5 && $r2->prop_age <=10)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.85;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.90;
                                                    }
            }
            if($r2->prop_age > 10 && $r2->prop_age <=20)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.75;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.80;
                                                    }
            }
            if($r2->prop_age > 20 && $r2->prop_age <=30)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.60;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.70;
                                                    }
            }
            if($r2->prop_age > 30 && $r2->prop_age <=40)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.45;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.60;
                                                    }
            }
            if($r2->prop_age > 40 && $r2->prop_age <=50)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.30;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.50;
                                                    }
            }
            if($r2->prop_age > 50 && $r2->prop_age <=60)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.20;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.40;
                                                    }
            }
            if($r2->prop_age > 60)
            {
                                                  if($r2->prop_stru == 'a' || $r2->prop_stru == 'b')
                                                    {
              $dghasara = 0.15;
                                                    }

                                                  if($r2->prop_stru == 'c' || $r2->prop_stru == 'd')
                                                    {
              $dghasara = 0.30;
                                                    }
            }
?>

                                  <?php 

            $bharank = array(
              'RESIDENTIAL' => '1.00',
              'COMMERCIAL' => '1.25',
              'INDUSTRIAL' => '1.20',
              'PUBLIC' => '1.00',
              'SEMIPUBLIC' => '1.25',
              'OPENPLOT' => '1.20'
              );

        
            $sq2 = "SELECT * FROM rate_card WHERE id = 1";
            $rate2 = $conn->query($sq2);
            $rates2 = $rate2->fetch_array();
            //print_r($rates2);
          ?>

          <tr>
            <td width="60px" align="center">&nbsp;<?php echo $prop_stru1 = $prop_stru[$r2->id];?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo $builtarea_total_sum1 = number_format($builtarea_total,2); ?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo number_format($built_total[$r2->prop_stru],2); ?>&nbsp;</td>
            <!-- <td align="center">&nbsp;<?php echo $dghasara; ?>&nbsp;</td> -->
            <td align="center">&nbsp;<?php echo $r2->GhararaN; ?>&nbsp;</td>
             <td align="center">&nbsp;<?php echo $bharank[$r2->prop_use]; ?>&nbsp;</td>
            <td align="center">&nbsp;<?php $property_tax = ($builtarea_total_sum1 * $built_total[$r2->prop_stru]) * $r2->GhararaN * $bharank[$r2->prop_use]; echo number_format($property_tax,2);?>&nbsp;</td>
                                        </tr>
<?php $builtarea_total_asum1[] = $builtarea_total_sum1;?>

<?php } ?>

<?php $builtarea_total_asum1 =  array_sum($builtarea_total_asum1);?>
          
        </tbody>
      </table>
<!-- Thired -->

<!-- fourth -->
<table class="table1">
           <tbody>

                                        <tr>
            <td width="210px" align="center">&nbsp;खुल्या जागेचे क्षेत्रफळ (चौ.फुट.)&nbsp;</td>
<?php $total_plot_area = $row->total_plot_area;?>
            <td width="180px" align="center">&nbsp;<?php $remain_plot_area = 
$row->open_plot_area ; echo number_format($remain_plot_area,2);?>&nbsp;</td>
            <td width="212px" align="center">&nbsp;खुल्या जागेचे रेडीरेकनर दर&nbsp;</td>
            <?php $sq6 = "SELECT * FROM rate_card WHERE id = 1";
            $rate6 = $conn->query($sq6);
            $rates6 = $rate6->fetch_object();
            //print_r($rates6);
            ?>
            <td width="200px" align="center">&nbsp;<?php echo number_format($open_plot[$row->openplot_type],2);?>&nbsp;</td>
            <!--<td width="200px" align="center">&nbsp;<?php echo $redig=$rates6->redigdar;?>&nbsp;</td>-->
            <td width="180px" align="center">&nbsp;खुल्या जागेचे भांडवली मुल्य&nbsp;</td> 
              <td width="205px" align="center">&nbsp;<?php $plot_area_tax = ($remain_plot_area * $open_plot[$row->openplot_type]); echo number_format($plot_area_tax,2);?>&nbsp;</td>
          </tr>
                                        <tr>
            <td  colspan="11" valign="middle"><strong style="font-size: 14px;">&nbsp;मालमत्तेचे स्वरूप, मजला, वापर, इमा.वय, चतुर्सीमा, बांधकामाचे क्षेत्रफळ माहिती  &nbsp;</strong></td>
          </tr>
            </tbody>
       </table>
<!-- fourth -->
<!-- fifth -->
  <?php
        $queryn ="SELECT * FROM property_details where prop_id = ".$id;
        $query_res6 = $conn->query($queryn);
        $pro_res = $query_res6->fetch_object();

        ?>
        <?php //echo $pro_res->builtup_total; ?>
<table class="table1" id="maintext"<?php if ($pro_res->builtup_total==0.00){ echo 'style="display:none;"'; } ?> >
         <tbody>
          <tr height="12px">
            <td width="80px" align="center">&nbsp;इमा. स्व.&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा. मजला&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा. वापर&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा.आयू.&nbsp;</td>
            <!--<td colspan="2" width="180px" align="center">&nbsp;चर्तू: सीमा&nbsp;</td>-->
<td width="80px" align="center">&nbsp;लांबी (चौ.मी)&nbsp;</td>
<td width="80px" align="center">&nbsp;रुंदी (चौ.मी)&nbsp;</td>
            <td width="80px" align="center">&nbsp;क्षेत्रफळ (चौ.फुट)&nbsp;</td>
            <td width="80px" align="center">&nbsp;क्षेत्रफळ (चौ.मी.)&nbsp;</td>
            <td width="420px" align="center">&nbsp;बांध. कर = (बांध. क्षेत्र. X बांध.भांड. दर) X घसारा दर X भारांक /1000 X बांध. प्रकारानुसार दर&nbsp;</td>
          </tr>

<?php 
$sq1 = "SELECT * FROM property_details where prop_id = ".$id;
  $res1 = $conn->query($sq);
  while ($r1 = $res1->fetch_object()) {
  //echo '<pre>'.print_r($r1->builtup_total,true).'</pre>';
/*$prop_stru_a = array();
if($r1->prop_stru == 'a')
{
  array_push($prop_stru_a, $r1->prop_stru);
}
print_r($prop_stru_a);*/ 

    $total_built[$r1->id] =$r1->total_built;    
    $prop_stru[$r1->id] = $struc_array[$r1->prop_stru];
                $prop_floor[$r1->id] = $r1->prop_floor;
    $prop_use[$r1->id] = $use_array[$r1->prop_use];
    $prop_age[$r1->id] = $r1->prop_age;
    $builtarea_pp[$r1->id] = $r1->builtarea_pp;
               $builtarea_ud[$r1->id] = $r1->builtarea_ud;
$builtarea_total = $r1->builtup_total; 

                                                if($r1->prop_age >= 0 && $r1->prop_age <=2)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 1.00;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 1.00;
                                                    }
            } 
            if($r1->prop_age >2 && $r1->prop_age <=5)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.95;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.95;
                                                    }
            }
            if($r1->prop_age > 5 && $r1->prop_age <=10)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.85;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.90;
                                                    }
            }
            if($r1->prop_age > 10 && $r1->prop_age <=20)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.75;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.80;
                                                    }
            }
            if($r1->prop_age > 20 && $r1->prop_age <=30)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.60;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.70;
                                                    }
            }
            if($r1->prop_age > 30 && $r1->prop_age <=40)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.45;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.60;
                                                    }
            }
            if($r1->prop_age > 40 && $r1->prop_age <=50)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.30;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.50;
                                                    }
            }
            if($r1->prop_age > 50 && $r1->prop_age <=60)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.20;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.40;
                                                    }
            }
            if($r1->prop_age > 60)
            {
                                                  if($r1->prop_stru == 'a' || $r1->prop_stru == 'b')
                                                    {
              $dghasara = 0.15;
                                                    }

                                                  if($r1->prop_stru == 'c' || $r1->prop_stru == 'd')
                                                    {
              $dghasara = 0.30;
                                                    }
            }
?>

                                  <?php 

            $bharank = array(
              'RESIDENTIAL' => '1.00',
              'COMMERCIAL' => '1.25',
              'INDUSTRIAL' => '1.20',
              'PUBLIC' => '1.00',
              'SEMIPUBLIC' => '1.25',
              'OPENPLOT' => '1.20'
              );

        
            $sq = "SELECT * FROM rate_card WHERE id = 1";
            $rate = $conn->query($sq);
            $rates = $rate->fetch_array();
            //print_r($rates);
          ?>

          <tr>
              
            <td align="center">&nbsp;<?php echo $prop_stru1 = $prop_stru[$r1->id];?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo $prop_floor[$r1->id];?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo $prop_use[$r1->id];?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo $prop_age[$r1->id];?>&nbsp;</td>
            <!--<td align="center">&nbsp;पुर्व&nbsp;</td>
            <td align="center">&nbsp;पश्चिम&nbsp;</td>-->
            <!--<td align="center">&nbsp;<?php echo $builtarea_pp[$r1->id];?>&nbsp;</td>-->
<td align="center">&nbsp;<?php echo $builtarea_pp[$r1->id];?>&nbsp;</td>
<td align="center">&nbsp;<?php echo $builtarea_ud[$r1->id];?>&nbsp;</td>
<!-- <td align="center">&nbsp;<?php echo $builtarea_pp[$r1->id]*$builtarea_ud[$r1->id];?>&nbsp;</td> -->
            <td align="center">&nbsp;<?php echo $builtarea_total_sum = $builtarea_total; ?>&nbsp;</td>
<td align="center">&nbsp;<?php echo number_format($total_built[$r1->id],2);?>&nbsp; </td>

<?php $property_tax =($total_built[$r1->id] * $built_total[$r1->prop_stru]) * $r1->GhararaN * $bharank[$r1->prop_use]/1000 * $rates[$r1->prop_stru]?>

  <td align="center">&nbsp;(<?php echo number_format($total_built[$r1->id],2); ?> X <?php echo $built_total[$r1->prop_stru];?>) X <?php echo $r1->GhararaN ?> X <?php echo $bharank[$r1->prop_use]; ?> / 1000 X <?php echo $rates[$r1->prop_stru]; ?> = <?php $property_tax_round = round($property_tax,2); echo number_format($property_tax_round,2); ?> &nbsp;</td>

<?php $property_tax_round_total[] = $property_tax_round;?>
<?php $builtarea_total_asum[] = $builtarea_total_sum;?>
            
          </tr>
          <!--<tr>
            <td align="center">&nbsp;उत्तर&nbsp;</td>
            <td align="center">&nbsp;दक्षिण&nbsp;</td>
                                                <td align="center">&nbsp;<?php echo $builtarea_ud[$r1->id];?>&nbsp;</td>
          </tr>-->

<?php } ?>
<?php $builtarea_total_asum =  array_sum($builtarea_total_asum);?>
<?php $total_built_area = $row->total_plot_area - $row->open_plot_area; ?>

        </tbody>
      </table>
<!-- fifth -->
<!-- khula -->
<table class="table1" id="maintext" <?php if ($row->cgruh==0){ } ?>>
         <tbody>
          <tr height="12px">
            <td width="80px" align="center">&nbsp;इमा. स्व.&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा. मजला&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा. वापर&nbsp;</td>
            <td width="80px" align="center">&nbsp;इमा.आयू.&nbsp;</td>
<td width="80px" align="center">&nbsp;लांबी (चौ.मी)&nbsp;</td>
<td width="80px" align="center">&nbsp;रुंदी (चौ.मी)&nbsp;</td>
            <td width="80px" align="center">&nbsp;क्षेत्रफळ (चौ.फुट)&nbsp;</td>
            <td width="80px" align="center">&nbsp;क्षेत्रफळ (चौ.मी)&nbsp;</td>
            <td width="420px" align="center">&nbsp;बांध. कर = (बांध. क्षेत्र. X बांध.भांड. दर) X घसारा दर X भारांक /1000 X बांध. प्रकारानुसार दर&nbsp;</td>
          </tr>         
          <tr height="12px">
              <?php
              $bposs_type = array(
              "a" => "अ",
              "b" => "ब",
              "c" => "क",
              "d" => "ड",
            );
                  ?>
            <td align="center">&nbsp;<?php echo $bposs_type[$row->bopenplot_type];?>&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;<?php echo $row->bklambhi; ?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo $row->bkrundhi; ?>&nbsp;</td>
            <td align="center">&nbsp;<?php echo number_format($row->bopen_plot_area,2); ?>&nbsp;</td>  
            <td align="center">&nbsp;<?php echo number_format($row->bopen_plot_area_fut,2); ?>&nbsp;</td>          
            <td align="center">&nbsp;<?php echo $row->cgruh; ?>&nbsp;</td>            
          </tr>
 </tbody>
      </table>
<!-- khula -->

<!-- sixth -->
 <?php
        $query = "SELECT * FROM rate_card";
        $query_res = $conn->query($query);
        $rate_res = $query_res->fetch_object();
        ?>
<table class="table1">
         <tbody>
          <tr>
              <?php $sq3 = "SELECT * FROM property_details where prop_id = ".$id;
                      $res3 = $conn->query($sq3);
                      while ($r3 = $res3->fetch_object()) {
                      $tes[]= $r3->total_built;
                      ?>
                      <?php }
                      ?>
            <td width="179px" align="center">&nbsp;एकूण जागेचे क्षेत्रफळ (चौ.मी)&nbsp;</td>
            <!--<td width="148px" align="center">&nbsp;<?php echo $total_plot_area = $r3->total_plot_area;?>&nbsp;</td>-->
            <td width="148px" align="center">&nbsp;<?php 
$totalgruha_area = array_sum($tes) + $row->open_plot_area_fut;
if ($totalgruha_area ==0) {
  echo $row->bopen_plot_area_fut;
}
else{
  echo $totalgruha_area;
}
?>              &nbsp;</td>
            <td colspan="2" width="150px" align="center">&nbsp; खाली जागेचे क्षेत्रफळ (चौ.फुट)</td>
            <!--<td width="150px" align="center">&nbsp;<?php echo number_format($builtarea_total_asum,2);?>&nbsp;</td>-->
            <!--<td width="150px" align="center">&nbsp;<?php echo number_format($total_built_area,2);?></td>-->
            <!-- <td width="150px" align="center">&nbsp;<?php echo number_format($row->open_plot_area_fut,2);?>sss</td> -->
            <?php $remain_plot_area = $row->open_plot_area ; //echo number_format($remain_plot_area,2);?>
            <td width="150px" align="center"><?php $remain_plot_area = $row->open_plot_area ; echo number_format($remain_plot_area,2); ?></td>
            <td colspan="2" width="144px" align="center">&nbsp;खाली जागेचे क्षेत्रफळ (चौ.मी.)<br>&nbsp;  &nbsp;
<?php $remain_plot_area = $row->open_plot_area ; //echo number_format($remain_plot_area,2);?>
<?php $open_plot_area_futn = $row->open_plot_area_fut ; //echo number_format($remain_plot_area,2);?>
<?php echo number_format($row->open_plot_area_fut,2);?>&nbsp; </td>

<?php $open_value = $open_plot[$row->openplot_type]; $plot_area_tax = ($open_plot_area_futn * $open_value) / 1000 * 1.5; ?>

              <td colspan="2" width="180px" align="center">&nbsp;(जमि. क्षेत्र.X जमि. वा. मुल्य दर) / 1000 X खु.जा. प्रति चौ. मि. दर <br/> (<?php $open_value = $open_plot[$row->openplot_type]; echo number_format($open_plot_area_futn,2); ?> X <?php echo number_format($open_value); ?>) / 1000 X 1.5 =  <?php echo number_format($plot_area_tax,2); ?>&nbsp;</td>
          </tr>
          <tr height="30px;">
            <td align="center"><strong>&nbsp;खुल्या जागेवरील कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;बाध.कर/गृह कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;विज कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;आरोग्य कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;सफाई कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;सामान्य पाणी कर&nbsp;</strong></td>
            <td align="center"><strong>&nbsp;विशेष पाणी कर&nbsp;</strong></td>
             <!-- <td align="center"><strong>&nbsp;&nbsp;मागील थकीत</strong></td>  -->
            <td colspan="2" align="center"><strong>&nbsp;एकूण कर&nbsp;</strong></td>
          </tr>
          <tr height="30px;">
            <td align="center">&nbsp; <?php 
if($plot_area_tax== 0.00){
echo $row->ckhali;
}else{
  echo number_format($plot_area_tax,2);
}?>&nbsp;</td>
            <td class="oa" style="outline:none;display:none;"><input type="text" size="7" id="oa" name="oa" value="<?php echo $plot_area_tax;?>" readonly></td>
           <!--  <td align="center" class="pa">&nbsp;<?php echo $property_tax_all_total = array_sum($property_tax_round_total); ?>&nbsp;</td> -->
            <td align="center" class="pa">&nbsp;
<?php 
if($property_tax_all_total == 0.00){
echo $row->cgruh;
}else{
  echo $property_tax_all_total = array_sum($property_tax_round_total);
}
?>
              <?php //echo $property_tax_all_total = array_sum($property_tax_round_total); ?>&nbsp;</td>
            <td class="pa" style="outline:none;display:none;"><input type="text" size="7" id="pa" name="pa" value="<?php echo $property_tax_all_total = array_sum($property_tax_round_total);?>" readonly></td>
            
            <!--<td align="center">&nbsp;<?php echo number_format($row->cdiw,2); ?>&nbsp;</td>-->
            <!-- <td align="center">&nbsp;<?php echo number_format($rate_res->vij,2); ?>&nbsp;</td> -->
                                       <td align="center">&nbsp;<?php 
if ($plot_area_tax !== 0.00 && $property_tax_all_total !== 0.00 ) {
  echo $vijmain = $rate_res->vij;
}
else if ($plot_area_tax !== 0.00) {
 echo $vijmain = '0.00';
}
else{ 
echo $vijmain = $rate_res->vij;
}
            ?>&nbsp;</td>
             <!-- <td align="center">&nbsp;<?php echo number_format($rate_res->arog,2); ?>&nbsp;</td>  -->
           <td align="center">&nbsp;<?php 
if ($plot_area_tax !== 0.00 && $property_tax_all_total !== 0.00 ) {
  echo $arogmain = $rate_res->arog;
}
else if ($plot_area_tax !== 0.00) {
 echo $arogmain = '0.00';
}
else{ 
echo $arogmain = $rate_res->arog;
}
            ?>&nbsp;</td>
            <!-- <td align="center">&nbsp;<?php echo number_format($rate_res->pani,2); ?>&nbsp;</td> -->
          <?php //echo number_format($property_tax_all_total,2);?>  
          <td align="center">&nbsp; <?php echo number_format($rate_res->csafai,2); ?>&nbsp; </td>
          <td align="center">&nbsp;

              <?php 
$water = json_decode($row->water);$water = (array) $water; 
if (array_key_exists('public_conn', $water) !=''){
    echo $swater1 = number_format($rate_res->pani,2);
}else{
    echo '';
}

            //echo number_format($rate_res->pani,2); ?>&nbsp; </td>
            
            <!--<td align="center">&nbsp;<?php if($plot_area_tax != 0.00 && $property_tax_all_total !=0){ echo $current_health=25.00;} else if($property_tax_all_total != 0.00){
          echo $current_health=25.00;
          }else{ echo $current_health=0.00; } ?>&nbsp;</td>
                        <td align="center">&nbsp;<?php $water = json_decode($row->water);$water = (array) $water; 
                if (array_key_exists('water_conn', $water)){
                  echo $water = number_format($water_conn_tax,2);
                }else{
                  echo $water = '0.00';
                } 
                ?>&nbsp;</td> -->
                 <td align="center">&nbsp;

              <?php 
$water = json_decode($row->water);$water = (array) $water; 
if (array_key_exists('water_conn', $water) !=''){
    echo $swater = number_format($rate_res->vpani,2);
}else{
    echo '';
}

            //echo number_format($rate_res->pani,2); ?>&nbsp; </td>
                <!-- <td align="center">&nbsp;<?php echo number_format($rate_res->vpani,2); ?>&nbsp;</td> -->
                <!--<td></td>-->
<!-- <td align="center"><?php echo number_format($row->pending_bill,2); ?></td> -->
                <?php //echo $swater1;?>
                <?php //echo $swater;?>
<?php $total_tax = $row->cgruh + $vijmain+ $rate_res->csafai + $arogmain + $swater+$swater1 + $plot_area_tax + $property_tax_all_total+$row->ckhali  ?>
            <td colspan="2" align="center">&nbsp;<strong style="font-size: 14px;"><?php echo round($total_tax,2);?></strong>&nbsp;</td>
          </tr>
          <tr>
            <td  colspan="7" valign="middle"><strong style="font-size: 14px;">&nbsp;अपिलाचे निकाल आणि त्यावर केलेले फेरफार (रुपये)&nbsp;</td>
            <td  colspan="2" valign="middle">&nbsp;शेरा&nbsp;</strong></td>
          </tr>
        </tbody>
      </table>
      <table class="table1">
         <tbody>
          <tr>
            <td width="155px" align="center">&nbsp;खुल्या जागेवरील कर&nbsp;</td>
            <td width="120px" align="center">&nbsp;बाध.कर/गृह कर&nbsp;</td>
            <td width="120px" align="center">&nbsp;विज कर&nbsp;</td>
            <td width="140px" align="center">&nbsp;आरोग्य कर&nbsp;</td>
            <td width="140px" align="center">&nbsp;सफाई कर&nbsp;</td>
            <td width="140px" align="center">&nbsp;सामान्य पाणी कर&nbsp;</td>
            <td width="140px" align="center">&nbsp;विशेष पाणी कर&nbsp;</td>
            <td width="124px" align="center">&nbsp;एकूण कर&nbsp;</td>
            <td rowspan="2" width="312px" align="center">&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center">&nbsp;&nbsp;</td>
            <td class="id" style="visibility: hidden;"><input type="hidden" size="7" id="id" name="id" value="<?php echo $row->id; ?>" readonly></td>
          </tr>
          <tr>
            <td colspan="9" align="center" id="t" style="line-height:28px;"><strong style="font-size: 14px;">&nbsp;टीप :- सदर उतारा हा मालकी हक्काचा नसून कर आकारणीचा आहे . (त्यानुसार सदरच्या उतार्‍यावरून खरेदी विक्रीचा व्यवहार झाल्यास ग्रामपंचायत जबाबदार राहणार नाही.)</strong?</td>
          </tr>

        </tbody>
      </table>
      <table width="1300px" style="border: 0px solid black; margin-top:15px;">
          <tbody><tr>
            <td align="center" style="border: 0px solid black; visibility:hidden;" >&nbsp;सचिव&nbsp;<br>&nbsp;<br>&nbsp; ग्रामपंचायत <?php echo $gram_res->gram_name; ?>&nbsp;</td>
            <td align="center" style="border: 0px solid black;">&nbsp;सचिव / सरपंच &nbsp;<br>&nbsp;<br>&nbsp; गट ग्रामपंचायत  <?php echo $gram_res->gram_name; ?>&nbsp;</td>
            
          </tr>
        </tbody></table>
<!-- sixth -->       

        </div>
      </div>     
      
      <?php 
    }
    ?>                    

      
<style type="text/css" media="print">
@media print {
 
        #buttonDiv {
            display: none;
        }
        #buttonPrint {
            display: none;
        }
        #header-2 {
            display: none;
        }
        .block-header{
            display: none;
        }
}
</style>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">    
  // American Numbering System
  var th = ['','thousand','million', 'billion','trillion'];
  // uncomment this line for English Number System
  // var th = ['','thousand','million', 'milliard','billion'];

  var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; 

  function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');
  }


amount = toWords($('#no_amount').text());
//alert(amount);
$('#word_amount').html(amount);
</script>

</body>
</html>
