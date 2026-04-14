<?php
session_start(); // เริ่มต้นเซสชัน

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // ถ้าไม่ได้ล็อกอิน จะส่งไปที่หน้า login
    exit();
}
!
$username = $_SESSION['username']; // ดึงชื่อผู้ใช้ที่ล็อกอินเข้ามา
?>
!
<!DOCTYPE html>
<html>
<head>
<title>Project</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<style>
  .checked {
    color: red;
    box-sizing: border-box;
  }

  h3 {
    display: flex; /* ใช้ Flexbox */
    justify-content: space-between; /* แบ่งพื้นที่ระหว่างชื่อหนังและหัวใจ */
    align-items: center; /* จัดให้อยู่กลางแนวตั้ง */
}
</style>
  
</head>
<body>

<!-- Navbar แถบเมนู -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="p1.php" class="w3-bar-item w3-button"><b>Movie Review</b> </a>
    <div class="w3-right w3-hide-small">
      <a href="p2thai.php" class="w3-bar-item w3-button">หนัง/ซีรีส์ไทย</a>
      <a href="p3korea.php" class="w3-bar-item w3-button">หนัง/ซีรีส์เกาหลี</a>
      <a href="p4jeen.php" class="w3-bar-item w3-button">หนัง/ซีรีส์จีน</a>
      <a href="reviews3.php" class="w3-bar-item w3-button">post</a>
      <a href="submit_review.php" class="w3-bar-item w3-button">reviews</a>
      <a href="favorited.php" class="w3-bar-item w3-button">favourite (<?php echo $username; ?>)</a>
      <a href="login.php" class="w3-bar-item w3-button">logout</a>
  

    <main id="main"></main>
    </div>
  </div>
  
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <div class="container">
  <img class="w3-image" src="img/ปกหลัก.jpg" alt="Architecture" width="1500" height="800">
  <div class="overlay">Welcome</div>
  <div class="w3-display-middle w3-margin-top w3-center">
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">แนะนำ</h3>
    <p>มากับการ Review!!! ซีรีส์และหนังภาพยนตร์น่าดู เรื่องไหนดี มีอย่างครบเครื่อง รวมทุกปีครบทุกแนวทั้งใหม่และเก่า กับขวัญใจดารานักแสดงทั้ง ไทย จีน เกาหลีที่คุณชื่นชอบ เตรียมฟินจิกหมอน มีทั้งตลก แฟนตาซี ฮาเบาสมอง ดราม่า ระทึกขวัญ เนื้อเรื่องเข้มข้น กับซีรีส์เด็ด ภาพยนตร์ดัง ที่คอหนังและซีรีส์ ห้ามพลาดด้วยประการทั้งปวง

คอหนังและซีรีส์ระดับเริ่มต้นหรือระดับเซียนแล้ว มีเวลาว่างอยากจะดูหนังและซีรีส์ดีดี ที่เม๊าท์มอยกับคนอื่นได้ไม่ตกเทรนด์  จะมีพล็อตเรื่องไหน แนวไหนน่าสนใจ เราแนะนำและรวมมาให้แล้วจ้า มีครบทั้งการReviewเนื้อเรื่อง รายละเอียดต่างๆของหนังและซีรีส์สุดเข้มข้น  คะแนนจากผู้รับชมจริง ซึ่งเป็นการประกอบการตัดสินใจให้แก่คนที่เข้ามาสู่Website ของเราได้อย่างดีเยี่ยม ช่วงนี้คงไม่มีอะไรดีไปกว่าการอยู่กับเหย้าเฝ้ากับเรือน หาดูหนัง ดูซีรีส์ จะมีเรื่องไหนบ้าง ขอบอกว่าดาราไทย จีน เกาหลีและ ไอดอล ที่คุณชื่นชอบมารับบทแสดงกันเพียบ มาเตรียมรอดูกันเลย คอหนังและซีรีส์อย่าลืมติดตามWebsite Review หรือช่องทางการอัพเดตreview หนังและซีรีส์ ไทย จีน เกาหลีดีดีแบบไม่ตกเทรนด์ที่นี่ได้เลย ห้ามพลาด!! พร้อมแล้วไปหาดูกันเลย
    </p>

    <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/t1.jpg" alt="โปสเตอร์" class="image">
            <div class="overlay">เรื่องราวของ ทองคำ และ เสก คู่รักเกย์ผู้อุทิศตนทำงานอย่างไม่รู้จักเหน็ดเหนื่อยเพื่อสร้างชีวิตร่วมกัน จนมีทั้งบ้านและสวนทุเรียน ทว่าโศกนาฏกรรมกลับเกิดขึ้น เมื่อเสกเสียชีวิตกะทันหัน และต้องพบกับความจริงที่ว่าการสมรสเพศเดียวกันยังไม่ถือว่าเป็นคู่แต่งงานตามกฎหมายไทย </div>
        </div>
        <h3>วิมานหนาม<span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'วิมานหนาม', 'img/t1.jpg')"></span> </h3> 
        <p class="w3-opacity">หนังไทย (ดราม่า โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : โรงภาพยนตร์</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/t3.jpg" alt="โปสเตอร์" class="image">
            <div class="overlay">พ่อลูกกำลังขึ้นรถไฟเคทีเอ็กซ์ที่จะพาทั้งสองเดินจากจากกรุงโซลไปยังเมืองปูซานเพื่อเยี่ยมภรรยาเก่าที่ไม่ได้พบกันมานาน แต่เมื่อรถไฟกำลังจะเคลื่อนออกจากชานชาลา สถานีรถไฟกลับถูกฝูงซอมบี้โจมตี</div>
        </div>
        <h3>ด่วนนรก ซอมบี้คลั่ง <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'ด่วนนรก ซอมบี้คลั่ง', 'img/t3.jpg')"></span> </h3> 
        <p class="w3-opacity">หนังเกาหลี (แอคชั่น สยองขวัญ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/t2.jpg" alt="โปสเตอร์" class="image"> <!-- เปลี่ยนชื่อไฟล์ให้ตรง -->
            <div class="overlay">หนังมันมีหลายจุดที่เนื้อหาเข้าถึงชีวิตคนธรรมดาทั่วไปได้ คนไทยเชื้อสายจีนจะโดนเยอะหน่อยเพราะเหมือนมาก คนไทย อาจจะมีบางจุดที่คล้ายๆ แต่มันต้องมีจุดที่แต่ละคนน้ำตาซึม น้ำตาแตกกันบ้างแหละ ตอนอาม่าโดนเอาไปปล่อยในบ้านพักคนชรา อยู่รวมๆกัน อาม่าอยู่ลิบๆเลย ยิ้มโครตเศร้า แล้วม่ายังถามเอ็มอีกว่ากินอะไรมายัง คือแบบ ตัวเองก็จะเอาตัวไม่รอดอยู่แล้ว เลิกห่วงคนอื่นก๊ออนนน ฉากที่ถ่ายสวยมากๆ และสมจริง การลำดับฉาก การเล่าเรื่อง การเลือกดนตรีประกอบ และนักแสดงเก่งสุดๆ สื่อถึงอารมณ์เข้าถึงบทบาทได้ดีมาก </div>
        </div>
        <h3> หลานม่า   <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'หลานม่า', 'img/t2.jpg')"></span> </h3> 
        <p class="w3-opacity">หนังไทย (แฟมิลี่ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <!-- เพิ่มภาพที่ 4 -->
    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/t4.jpg" alt="โปสเตอร์" class="image"> <!-- ใช้ชื่อไฟล์ของภาพที่ 4 -->
            <div class="overlay">เป็นหนังตลกร้าย ที่ดีที่สุด(ย้ำดีที่สุด) ในต้นปี เอกลักษณ์ สไตล์ โจวซิงฉือ 
ที่แฝงมุข ได้แบบแยบยล + เสียงพากย์ ฮา รั่ว บ้า ตามฉบับของพันธมิตร ที่ทำให้เรื่อง เงือกสาวปัง ปัง มีเสียงหัวเราะทั่วโรงภาพยนตร์ ไม่เสียดายตังค่าตั๋ว แน่นอน ยืนยัน!!!เรื่องราวมีอยู่ว่ามหาเศรษฐีหนุ่ม ทั้งหล่อและรวย ทุ่มเงินมหาศาลซื้อพื้นที่มากมาย ติดชายทะเล เพื่อหวังทำธุรกิจอสังหา และกอบโกยเงินหลายล้าน ต้นเหตุที่ทำให้ ธรรมชาติเสื่อมโทรม โดยเฉพาทะเลที่เป็นบ้านของเหล่าเงือก ดังนั้นเหล่าเงือกจึงคิดแผนที่จะฆ่าอิตาเศรษฐีหนุ่มคนนี้ และกลายเป็นจุดเริ่มต้นของเรื่องฮา ที่โคตรวุ่นวาย รวมถึงฉาก ทิ้งระเบิด ไล่ล่า หรือแม้แต่ฉากกำลังภายในที่ ถึงใจมาก
</div>
        </div>
        <h3> เงือกสาว ปัง ปัง  <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'เงือกสาว ปัง ปัง ', 'img/t4.jpg')"></span> </h3>  
        <p class="w3-opacity">หนังจีน (แฟนตาซี ตลก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Apple TV / TrueID</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
</div>

<div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/k7.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นเรื่องราวของความโรแมนติก ความเสียสละ ความรักชาติ ของพระเอกหนุ่มซึ่งเป็นทหารและนางเอกที่เป็นแพทย์หญิง ทั้งคู่มีโอกาศไปทำงานที่ยากลำบากเสี่ยงตายด้วยกัน ผ่านบททดสอบมากมายจนกลายเป็นความรักในที่สุด</div>
        </div>
        <h3>ชีวิตเพื่อชาติรักนี้เพื่อเธอ <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'ชีวิตเพื่อชาติรักนี้เพื่อเธอ ', 'img/k7.jpg')"></span> </h3>  
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/c61.jpg" alt="Dan" class="image">
            <div class="overlay">เป็นซีรีส์แนวความรักใสๆ น่ารักมาก บอกเล่าเรื่องราวของพี่น้องต่างสายเลือดที่เติบโตมาด้วยการเลี้ยงดูของคุณพ่อเลี้ยงเดี่ยวสองคน ที่ให้ความรักและความใส่ใจเด็กๆ ทั้งสามเหมือนเป็นลูกแท้ๆ ของตัวเอง แม้รอบข้างจะมองว่าพวกเขาไม่มีสายเลือดเดียวกัน ยังไงสักวันก็ต้องเป็นคนอื่น แต่ในมุมมองของบ้านนี้ คำพูดของคนอื่นไม่มีอิทธิพลกับพวกเขา เพราะความรักที่ได้จากสองพ่อและพี่น้องเป็นความรักที่ให้คนในครอบครัวอย่างแท้จริง เรื่องราวจะเป็นยังไงต่อต้องไปติดตามกันนะ</div>
        </div>
        <h3>ถักทอรักที่ปลายฝัน<span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'ถักทอรักที่ปลายฝัน', 'img/c61.jpg')"></span> </h3>  
        <p class="w3-opacity">ซีรีส์จีน (คอมเมดี้ | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTV </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
            <img src="img/k21.jpg" alt="John" class="image">
            <div class="overlay">ซีรีส์แนวอาชญากรรม-แอ็กชั่น ที่เรื่องราวจะติดตามการทำงานของนายตำรวจหนุ่ม พัคจุนโม ที่ต้องแทรกซึมตัวเองเข้าไปในแก๊งมาเฟียย่านคังนัม เพื่อที่จะสืบคดีค้ายาข้ามชาติ ซึ่งมีเครือข่ายครอบคลุมทั้งในเกาหลี จีน และญี่ปุ่น ในช่วงปี 1995
            </div>
        </div>
        <h3>
        The Worst of Evil 
        <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'The Worst of Evil' ,'img/k21.jpg')"></span>
        </h3> 
        <p class="w3-opacity">ซีรีส์เกาหลี (ระทึกขวัญ | อาชญากรรม)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Disney+ </p>
        <p class="w3-opacity">จำนวนตอน : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>


    <!-- เพิ่มภาพที่ 4 -->
    <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="container">
                <img src="img/c57.jpg" alt="Dan" class="image">
                <div class="overlay">ต้องบอกว่าเป็นซีรีสที่ดีมาก...</div>
            </div>
            <h3> ตงกงตำหนักบูรพา <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'ตงกงตำหนักบูรพา', 'img/c57.jpg')"></span> </h3>   
            <p class="w3-opacity">ซีรีส์จีน (ดราม่า | ย้อนยุคพีเรียด)</p>
            <p class="w3-opacity">ช่องทางการรับชม : WeTv / Netflix</p>
            <p class="w3-opacity">จำนวนตอน : 52 ตอน </p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
        </div>
    </div>

    <script>
        
        function toggleFavorite(element, title, imageUrl) {
    const isFavorite = element.classList.toggle('checked');

    console.log(`Toggle Favorite for: ${title}, isFavorite: ${isFavorite}`);

    fetch('add_favorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title: title, image_url: imageUrl, favorite: isFavorite }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message); // แสดงข้อความที่ส่งกลับจาก PHP
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


    </script>
</body>
</html>

</body>
</html>
