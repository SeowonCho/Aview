<!DOCTYPE html>
 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AVIEW main</title>

  <!-- Bootstrap core CSS -->
  <link href="all.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="index_css.css" rel="stylesheet">

</head>
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
<body>
<?php
        session_start();
        $appName=$_GET['appName'];
        $db=new mysqli('localhost', 'MJ', '1234', 'Aview');
        $check2="SELECT * from review where appName='$appName' order by star desc";
        $result=$db->query($check2);
        $total = $result->num_rows;
        if(isset($_SESSION['ID'])){        
?>
            <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="index.php">AVIEW</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="wrap">
            <div class="search">
            <input type="text" class="searchTerm" placeholder="What are you looking for?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="about.html">HOME</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="./contents.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                REVIEW</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="contact.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                RECOMMENDATION
                </a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="./mypage.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MYPAGE
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="./logout.php" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LOGOUT
                </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <?php
	} else{
    ?>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">AVIEW</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="What are you looking for?">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
     </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contents.php">REVIEW</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">RECOMMENDATION</a>
          </li>
          <!--<li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="./mypage.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MYPAGE
            </a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="./login.html" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              LOGIN
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
	}
  ?>
<button type="button" onClick="location.href='./view.php?appName=<?php echo $rows['appName'] ?>'" style="height:40px; width:350px;">최신순</button>
  
        <h2 align=center>앱</h2>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "200" align="center">번호 </td>
        <td width = "400" align = "center">앱 이름</td>
        <td width = "400" align = "center">작성자</td>
        <td width = "400" align = "center">별점</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
          $title=0;
                while($rows=$result->fetch_array(MYSQLI_ASSOC)){ //DB에 저장된 데이터 수 (열 기준)
        ?>      
                <tr>                    
                <td width = "200" align = "center"><?php echo $total?></td>
                <td width = "400" align = "center">
                <a href = "detail_review.php?appName=<?php echo $rows['appName']?>&user_info=<?php echo $rows['user_info_ID']?>">
                <?php echo $rows['appName']?></td>
                <td width = "400" align = "center"><?php echo $rows['user_info_ID']?></td>
                <td width = "400" align = "center"><?php echo $rows['star']?></td>
                </tr>
        <?php
                $total--;
                  $title=$rows['appName'];
                }
        ?>
        </tbody>
        </table>
 
        <div class = text>
        <!--<font style="cursor: hand" onClick="location.href='./write.php'">글쓰기</font>-->
        </div>
 
        <?php
        $rows=$result->fetch_array(MYSQLI_ASSOC);
        ?>
        <center>
        <br>
        <br>
        <button type="button" onClick="location.href='./write_review.php?appName=<?php echo $title?>'" style="height:40px; width:350px;">리뷰쓰기</button>
 
</body>
</html>