<?php
session_start(); // เริ่มต้นเซสชัน

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // ถ้าไม่ได้ล็อกอิน จะส่งไปที่หน้า login
    exit();
}

$username = $_SESSION['username']; // ดึงชื่อผู้ใช้ที่ล็อกอินเข้ามา
?>

<!DOCTYPE html>
<html>
<head>
<title>Project</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" herf="css/bootsrap.min.css">
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

.favorite {
    color: grey; /* สีเริ่มต้นของหัวใจ */
    cursor: pointer; /* เปลี่ยนเป็น pointer เมื่อ hover */
}

.favorite.checked {
    color: red; /* สีเมื่อหัวใจถูกเลือก */    
}
  
</style>
  
</head>
<body>

<!-- Navbar แถบเมนู -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="p1.php" class="w3-bar-item w3-button"><b>Movie Review</b> </a>
    <div class="w3-right w3-hide-small">
      <a href="p1.php" class="w3-bar-item w3-button">หน้าหลัก</a>
      <a href="p2thai.php" class="w3-bar-item w3-button">หนัง/ซีรีส์ไทย</a>
      <a href="p3korea.php" class="w3-bar-item w3-button">หนัง/ซีรีส์เกาหลี</a>
      <a href="p4jeen.php" class="w3-bar-item w3-button">หนัง/ซีรีส์จีน</a>
      <a href="reviews3.php" class="w3-bar-item w3-button">post</a>
      <a href="submit_review.php" class="w3-bar-item w3-button">reviews</a>
      <a href="favorited.php" class="w3-bar-item w3-button">favourite (<?php echo $username; ?>)</a>
      <a href="login.php" class="w3-bar-item w3-button">logout</a>
    </div>
  </div>
  
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <div class="container">
  <img class="w3-image" src="img/ปกจีน.jpg" alt="Architecture" width="1500" height="800">
  <div class="overlay">หนังยอดฮิตประจำเดือน</div>
  <div class="w3-display-middle w3-margin-top w3-center">
</header>


<br><h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">รักโรแมนติก</h3>

<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c41.jpg" alt="John" class="image">
            <div class="overlay">เป็นเรื่องราวของ “หลัวสืออีเหนียง” ลูกสาวตระกูลหลัว ตะกูลที่ทำให้เธอต้องใช้ชีวิตอย่างยากลำบาก วันหนึ่งเธอได้จดหมายจากแม่ใหญ่ให้เข้าพบถึงต้องเดินทางเข้าไปยังเมืองหลวง แต่ก็เกิดเหตุไม่คาดคิดเพราะเธอกลับเจอกับโจรสลัดเข้าโจมตีเพื่อหวังจะจับตัวไว้ แต่ก็ได้ “หย่งผิงโหว”แม่ทัพใหญ่แห่ง “สวีลิ่งอี๋” เข้ามาช่วยเหลือได้ทันเวลา และนั่นเป็นจุดเริ่มต้นที่ทั้งสองได้พบกัน หากอยากรู้ว่าเรื่องราวของพวกเขาเป็นอย่างไรต่อไป ต้องไปตามดูกันนะ</div>
        </div>
        <h3> ร้อยรักปักดวงใจ <span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'ร้อยรักปักดวงใจ ', 'img/c41.jpg')"></span> </h3>
        <p class="w3-opacity">ซีรีส์จีน (รักโรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTV </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c42.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นเรื่องของยุคที่ปีศาจเรืองอำนาจ คนที่อยู่เหนือมารต่าง ๆ ทั้งหมดคือเหล่าจอมมาร แน่นอนว่าเขามีความหลงไหลในอำนาจแต่ก่อนที่จะหลงอำนาจไปมากกว่านี้หัวหน้าเทพธิดาต้องย้อนเวลากลับไปถึง 500 ปี เพื่อหยุดยั่งไม่ให้เขากลายเป็นมารที่แสนชั่วร้ายแต่ระหว่างทางดันมีความรักที่ก่อขึ้นและมันยากจะห้ามใจ ถ้าอยากรู้ว่าจุดจบจะเป็นยังไงใครที่เป็นสาวกซีรีส์จีนแฟนตาซีย้อนยุคห้ามพลาด</div>
        </div>
        <h3>จันทราอัสดง <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (แฟนตาซี | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : TureID / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 34 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c44.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นเรื่องราวของเด็กสาวที่ตกหลุมรักเพื่อนวัยเด็กของพี่ชายตัวเอง เมื่อเวลาผ่านไปทุกคนเติบโตขึ้นหลังจากที่เธอเรียนจบและเข้ามหาวิทยาลัยในเมืองได้ ทำให้เธอได้เจอกับเขาคนนั้นอีกครั้ง ด้วยเหตุการณ์ต่าง ๆ เหล่านี้ทำให้พวกเขาได้ใกล้ชิดกันมากกว่าเคยจนเกิดเป็นความรัก เรื่องราวความรักสุดฟินของทั้งคู่มีให้ลุ้นทุกตอน เป็นเรื่องที่น่ารักมากก เหมาะกับสายรักโรแมนติกต้องไปตามดู</div>
        </div>
        <h3>แอบรักให้เธอรู้ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (โรแมนติก | วัยรุ่น )</p>
        <p class="w3-opacity">ช่องทางการรับชม : YOUKU </p>
        <p class="w3-opacity">จำนวนตอน : 25 ตอน  </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c45.jpg" alt="Dan" class="image">
            <div class="overlay">ซีรีส์เรื่องนี้สร้างมาจากนิยายดังของนักเขียน จิ่วลู่เฟยเซียง บอกเล่าเรื่องราวของมังกรพันปีที่โดนคนรักทรยศด้วยการลอกเอากระดูกมังกรไปผนึกไว้ทั้ง 4 ทิศ ยังโชคดีที่มีจิตวิญญาณของเขารอดกลับมาทำให้เวลาผ่านไป ได้พบกับนักพรตสาวที่เป็นคนช่วยตามหาชิ้นส่วนสำคัญที่หายไปให้กลับคืนมา ระหว่างทางที่ตามหานับวันความสัมพันธ์เริ่มเปลี่ยนไป จนวันหนึ่งความจริงได้เปิดเผยถ้าอยากรู้ว่าความจริงคืออะไรต้องรอดูเอาเอง!</div>
        </div>
        <h3>ล่าหัวใจมังกร <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (แฟนตาซี | โรแมนติก | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : YOUKU</p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน  </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c46.jpg" alt="Mike" class="image">
            <div class="overlay">ซีรีส์จีนแนวโรแมนติกย้อนยุค ภาพสวยงามมาก ๆ เป็นเรื่องราวเกี่ยวกับความรักหลายพันปีของเทพเซียน Yan Dan เป็นทายาทเพียงคนเดียวของเผ่าโบราณคือ แมงป่องสี่ใบ Yan Dan ต้องเผชิญกับอุปสรรคที่ยิ่งใหญ่ที่สุดในชีวิตของเขา และเรื่องราวความรักที่ไม่อาจเลี่ยงได้ ความรักของพวกเขาจะดำเนินต่อไปอย่างไร ต้องติดตามชม</div>
        </div>
        <h3>อวลกลิ่นละอองรัก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (แฟนตาซี | โรแมนติก | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : YOUKU / TrueID </p>
        <p class="w3-opacity">จำนวนตอน : 59 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c68.jpg" alt="John" class="image">
            <div class="overlay">เป็นหนังที่อาจจะสร้างความประทับใจให้กับสายคนชอบแนวรักโรแมนติก ซึ่งเรื่องเริ่มด้วยหญิงสาวได้เจอกับชายหนุ่มที่เธออยากกล้าที่จะรักในช่วงวัยรุ่นที่งดงามที่สุดตอนอายุ 18 ปี ยวีเจียวหย่างที่ถูกเพื่อนร่วมชั้นล้อว่าเป็น "ถังยะ" ได้ตกหลุมรักโจวซ่านนักเรียนที่ย้ายมาใหม่ตั้งแต่แรกพบ เธอช่วยให้โจวช่านทำความฝันให้เป็นจริง และคิดว่าโจวซ่านคือพรหมลิขิต จึงได้พยายามสอบให้ได้เมืองเดียวกับโจวซ่านและเติบโตไปด้วยกันกับโจวซ่าน </div>
        </div>
        <h3>กว่าจะรัก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (โรแมนติก | ชีวิต)</p>
        <p class="w3-opacity">ช่องทางการรับชม : iQlYl</p>
        <p class="w3-opacity">ความยาว : 110 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c69.jpg" alt="Jane" class="image">
            <div class="overlay">เรื่องเริ่มด้วยวิหารที่อยู่บนยอดเขาคนหลุนสามารถจำนำได้ทุกสิ่งเพื่อเป็นเครื่องนำทาง และราชาดอกไม้แห่งโลกนางฟ้าก็สิ้นใจอย่างกะทันหันต่อหน้าผู้ชมในฐานะผู้นำทาง องค์ประกอบต่าง ๆ เช่น หุ่นเชิด การดูดกลืนชีวิตและการยืดอายชัย ดอกโบตั๋นอาบไฟและวิญญาณสิ่งประดิษฐ์รวมอยู่ในเรืองราว และความปรารถนาของหัวใจมนุษย์ก็แสดงออกมา </div>
        </div>
        <h3>ดอกโบตั๋นที่ลุกไหม้ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (โรแมนติก | ชีวิต | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : iQlYl</p>
        <p class="w3-opacity">ความยาว : 86 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c80.jpg" alt="Mike" class="image">
            <div class="overlay">หนังจีนแฟนตาซีฟอร์มยักษ์สุดสนุกอีกหนึ่งเรื่อง  เรื่องราวของ จางเสี่ยวฝาน ที่ครอบครัวและคนในหมู่บ้านของเขาถูกฆ่าสังหารจนหมดเกลี้ยง มีเพียงตัวเขาเองที่รอดมาได้ สำนักชิงอวิ๋นได้มาพบและได้ช่วยเหลือเลี้ยงดูรับ จางเสี่ยวฝาน เป็นศิษย์ร่วมสำนัก เขาได้พบกับ ปี้เหยา สาวศิษย์พี่ร่วมสำนัก ที่ประมุขพรรคมารส่งตัวเข้ามาแอบแฝง แต่ทั้งสองเกิดความผูกพันกัน พร้อมฝ่าฟันอุปสรรคไปพร้อม ๆ กัน </div>
        </div>
        <h3>กระบี่เทพสังหาร <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แฟนตาซี | แอคชั่น | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 101 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c83.jpg" alt="Dan" class="image">
            <div class="overlay">เป็นเรื่องราวของสามสาวเพื่อนซี้สุดมิตรชิดใกล้อย่าง กลุ่มสาววัยทำงานที่กำลังเผชิญจุดเปลี่ยนสำคัญของชีวิต ทั้งสามจะให้กำลังและฝ่าฟันไปด้วยกันได้อย่างไร Delicious Romance สูตรรักฉบับโรแมนซ์ จึงเป็นสูตรสำเร็จของภาพยนตร์เฟรนด์ชิป ที่สามารถหาดูได้ง่าย แต่ถ้าใครที่อยากรับชมชีวิตวัยทำงานของสาวจีน และบรรยากาศบ้านเมืองประเทศจีนในช่วงโควิด-19 ระบาด เรื่องนี้ก็ตอบโจทย์ได้เป็นอย่างดี เว้นแต่คุณเป็นสาววัยทำงานที่กำลังตึงกับปัญหาชีวิตและการงาน </div>
        </div>   
        <h3>สูตรรักฉบับโรแมนซ์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (รักโรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 121 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c84.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นหนังรักวัยรุ่นที่ทำออกมาได้ค่อนข้างเรียลเลยทีเดียว การไม่ move on ตามตื๊อแฟนเก่าของเจิ้งอวี่ซิงอาจจะเป็นการกระทำที่โง่เขลาขัดใจใครหลายคน แต่อย่าลืมว่าตัวละครยังเป็นนักเรียนม.ปลาย ดังนั้นการที่เอาแต่ใจในความสัมพันธ์ก็คงจะไม่ใช่เรื่องแปลกอะไร เธอยังยึดติดกับคำว่ารักแรกของกันและกันที่จะทำให้ความสัมพันธ์ของพวกเขากลับมา อีกทั้งเธอดันไปตกหลุมรักเจิ้งอวี่ซิงทั้งๆที่รู้ว่าเขาไม่ได้มีใจให้ แต่สุดท้ายเธอก็ต้องยอมเรียนรู้ว่า “คนที่เราชอบ อาจจะไม่ได้ชอบเรา” </div>
        </div>
        <h3>ร้อนหน้า… ไว้มารักกัน <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (โรแมนติก | วัยรุ่น | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix / iQlYl </p>
        <p class="w3-opacity">ความยาว : 114 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>


    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">คอมเมดี้ ชีวิต แฟนตาซี</h3>
    
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c49.jpg" alt="John" class="image">
            <div class="overlay">เรื่องนี้คือฟินจิกหมอนมากก เป็นเรื่องราวความรักของมหาเทพสงครามกับธิดาหอบุพเพ ที่ต้องเผชิญเคราะห์กรรมความรักด้วยกัน 7 ชาติ เพราะมีคำทำนายว่าจอมมารชางไห่ที่โดนเซียนชูคงหรือมหาเทพสงครามพระเอกของเรื่องฆ่าตาย โดยตอนที่พระเอกฆ่าจอมมารสำเร็จนั้นได้สูญเสียพลังไปถึงครึ่งหนึ่ง จนถึงตอนนี้พลังก็ยังไม่ฟื้นคืนมา โดยเชื่อว่าถ้าไปเผชิญเคราะห์กรรมรักพลังจะฟื้นกลับมา นางเอกที่เป็นธิดาหอบุพเพจึงได้รับหน้าที่ผูกด้ายแดงให้พระเอก พระเอกกับนางเอกจึงต้องไปเผชิญเคราะห์กรรมความรักด้วยกัน ทั้งคู่จะสามารถผ่านเคราะห์กรรมได้หรือไม่ จอมมารจะฟื้นคืนชีพไหมก็ต้องไปดูกัน</div>
        </div>
        <h3>เจ็ดชาติหนึ่งปรารถนา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (เทพเซียน | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : iQIYI </p>
        <p class="w3-opacity">จำนวนตอน : 38 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c56.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นซีรีส์ที่อยู่ในช่วงการเรียนมหาลัย ความรักแนววัยใส น่ารักทั้งพระเอก นางเอกเลย เริ่มด้วยนางเอกเรียนเกี่ยวกับบัญชีและใกล้จะจบ ส่วนพระเอกเป็นคนที่ฉลาดและอัจฉริยะมาก ๆ ในด้านเกี่ยวกับฟิสิกส์ เขาทั้งสองคนรู้จักกันเพราะอุบัติเหตุ และความบังเอิญก็เกิดขึ้นเมื่อแม่ของนางเอกพระเอกเป็นเพื่อนกันและมีเหตุที่ทำให้นางเอกต้องมาอาศัยอยู่ที่บ้านของพระเอกและเรื่องราววุ่น ๆ จะเป็นอย่างไร ต้องติดตามต่อได้ในเรื่องเลย</div>
        </div>
        <h3>อุ่นไอในใจเธอ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (คอมแมดี้ | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTv / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 24 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c62.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นซีรีส์แนวโรแมนติกคอมเมดี้ที่สนุกและตลกมาก เรื่องราวของซีรีส์ได้บันทึกการเดินทางข้ามเวลาของนักเขียนบทละครที่ชื่อว่าเฉินเสี่ยวเชียนที่ตื่นขึ้นมาพบว่าตัวเองอยู่ในบทละครที่เธอเขียน ในบทละครเธอคือมีชื่อว่าเฉินเฉียนเฉียน เจ้าหญิงองค์ที่สามที่หยิ่งยโสและไม่เหมือนใครในเมืองฮวาหยวน เฉินเฉียนเฉียนเป็นเพียงตัวละครรองที่จะต้องเสียชีวิตในช่วงต้นเรื่อง เฉินเสี่ยวเชียนเชื่อว่าเธอจะกลับไปยังโลกของเธอได้ก็ต่อเมื่อเรื่องราวจบลงตัวเรื่องมีการจัดวางเนื้อเรื่องที่สนุกสนาน เฮฮาและน่าสนใจ  ต้องไปตามดูกันน้าา</div>
        </div>
        <h3>ข้านี่แหละองค์หญิงสาม <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (รักโรแมนติก | คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTV </p>
        <p class="w3-opacity">จำนวนตอน : 24 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c61.jpg" alt="Dan" class="image">
            <div class="overlay">เป็นซีรีส์แนวความรักใสๆ น่ารักมาก บอกเล่าเรื่องราวของพี่น้องต่างสายเลือดที่เติบโตมาด้วยการเลี้ยงดูของคุณพ่อเลี้ยงเดี่ยวสองคน ที่ให้ความรักและความใส่ใจเด็กๆ ทั้งสามเหมือนเป็นลูกแท้ๆ ของตัวเอง แม้รอบข้างจะมองว่าพวกเขาไม่มีสายเลือดเดียวกัน ยังไงสักวันก็ต้องเป็นคนอื่น แต่ในมุมมองของบ้านนี้ คำพูดของคนอื่นไม่มีอิทธิพลกับพวกเขา เพราะความรักที่ได้จากสองพ่อและพี่น้องเป็นความรักที่ให้คนในครอบครัวอย่างแท้จริง เรื่องราวจะเป็นยังไงต่อต้องไปติดตามกันนะ</div>
        </div>
        <h3>ถักทอรักที่ปลายฝัน <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (คอมเมดี้ | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTV </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c50.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวความรักระหว่างหนึ่งหญิงสองชาย และมีภาระหน้าที่การงานเข้ามาเกี่ยวข้องด้วย คาแรกเตอร์มันชัด คนหนึ่งก็แสนจะสุภาพบุรุษไม่มีฉวยโอกาส อย่างมากก็แค่จับมือ ส่วนอีกคนก็ถึงเนื้อถึงตัวตลอด หอมบ้าง จูบบ้าง นอนในผ้าห่มเดียวกันด้วย ชมจันทร์ด้วยกันอีก อร้าย!! ร้ายกับทุกคนแต่รักแค่เธอคนเดียว นางเอกก็ไม่รู้ใจตัวเอง กลายเป็นรักหน่วง ๆ อยากรักแต่ก็ไม่อยากรัก ความไม่รู้ว่าบทสรุปจะเป็นอย่างไร ทำให้ซีรีส์เรื่องนี้น่าติดตาม</div>
        </div>
        <h3>บุปผาวสันต์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (คอมเมดี้ | โรแมนติก | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : YOUKU / TrueID </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c73.jpg" alt="John" class="image">
            <div class="overlay">Kung Fu Yoga คือส่วนผสมที่ปั่นวัฒนธรรมจีนและอินเดียให้เข้ากันในรสชาติที่กำลังดี กลิ่นอายของวัฒนธรรมบอลลีวูดที่มีคนจีนไปเป็นตัวเดินเรื่อง สัมผัส และค้นพบ และที่น่าประทับใจคือการจำลองการสร้างสถานที่สำคัญหลายแห่งในอินเดียทำได้สมจริงและดูดี มีความอลังการงานสร้างสไตล์พี่จีน ซึ่งเป็นหนังแนวแอ็คชั่น คอมเมดี้ เล่าเรื่องแจ็ค (เฉินหลง) ศาสตราจารย์โบราณคดีชาวจีนร่วมกับสาวสวยชาวอินเดีย ตะลุยข้ามแดนเพื่อตามหาสมบัติ</div>
        </div>
        <h3>โยคะสู้ฟัด <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (ตลกคอมเมดี้ | แอคชั่น )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 107 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c76.jpg" alt="Jane" class="image">
            <div class="overlay">เนื้อเรื่องเกี่ยวกับเป้ย เซียะเป้ย ( เยว่ หยุนเผิง ) เป็นนักเขียนที่เอาแต่ใจตัวเอง เพราะเขารู้สึกว่าตัวเองอ้วนเกินไป เนื่องจากรูปร่างหน้าตาที่ย่ำแย่ของเขา เขาจึงมักจะวิ่งชนกำแพงในชีวิตจริง ต่อมา เขาบังเอิญไปเจอต้นไม้ตระกูลหนึ่งซึ่งปกคลุมไปด้วยฝุ่น และบังเอิญข้ามผ่านยุคสมัยต่างๆ เพื่อมาพบกับบรรพบุรุษของเขา เป็นหนังแนวตลกคลายเครียด ผจญภัย แฟนตาซี ใครที่ชอบแนวนี้แนะนำเลย </div>
        </div>
        <h3>Faces of My Gene <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (ตลกคอมเมดี้ | แฟนตาซี )</p>
        <p class="w3-opacity">ช่องทางการรับชม : IMDb</p>
        <p class="w3-opacity">ความยาว : 118 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c77.jpg" alt="Mike" class="image">
            <div class="overlay">ภาพยนตร์เรื่องนี้มีความยาวที่ยาวเกินไปเล็กน้อย (ประมาณ 2 ชั่วโมง) และควรตัดต่อเรื่องราวให้คมชัดกว่านี้ แม้ว่าการตัดต่อที่สร้างสรรค์และประสบความสำเร็จจะทำให้บางฉาก เช่น คอนเสิร์ตสุดท้าย กลายเป็นเรื่องน่าจดจำและเต็มไปด้วยพลังก็ตาม ข้อดีอย่างหนึ่งที่น่าเสียดายที่ผู้ชมชาวเอเชียเท่านั้นที่จะเข้าใจได้ก็คือ “City of Rock” เต็มไปด้วยดาราดังและร็อคสตาร์ชาวจีนตัวจริงที่ปรากฏตัวในตอนท้ายก็เป็นภาพยนตร์ที่ให้ความบันเทิงเบาๆ จริงใจ ร่าเริง ชวนยิ้ม และมีความภูมิใจในหมวดหมู่นั้น</div>
        </div>
        <h3>City of Rock <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (ตลกคอมเมดี้ | ชีวิต)</p>
        <p class="w3-opacity">ช่องทางการรับชม : IMDb </p>
        <p class="w3-opacity">ความยาว : 140 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c79.jpg" alt="Dan" class="image">
            <div class="overlay">หนังจีนกําลังภายในที่มาพร้อมความแฟนตาซี และความฮาแบบเต็มรูปแบบ เรื่องราวของ เฟิงซื่อไห่ องครักษ์เสื้อแพรสุดยอดฝีมือ เขามีหน้าที่กำกับดูแลและคอยฝึกฝนสัตว์ประหลาดลึกลับตัวหนึ่ง แต่แล้ววันหนึ่งด้วยจิตใจอันอ่อนโยน เฟิงซื่อไห่ จึงตัดสินใจปล่อยสัตว์ประหลาดตัวนั้นออกไปเป็นอิสระ จนทำให้ตัวเขาเองเดือดร้อนและถูกตามไล่ล่า ในขณะที่เขากำลังหนีตายเอาตัวรอด สัตว์ประหลาดที่เขาปล่อยไปก็ปรากฏตัวขึ้นมา</div>
        </div>
        <h3>อสูรยักษ์สะท้านฟ้า <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | ตลก | แฟนตาซี)</p>
        <p class="w3-opacity">ช่องทางการรับชม : MONO MAX</p>
        <p class="w3-opacity">ความยาว : 104 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c82.jpg" alt="Mike" class="image">
            <div class="overlay">ตัวหนังจะมีความเป็นเอเซียสูง ทั้งเรื่องราวและมุกตลกที่ใช้ในหนัง แต่หนังกลับได้รับการยอมรับในตลาดสากล หนังได้คะแนนบนเว็บไซต์ Rottentomatoes สูงถึง 91% จากนักวิจารณ์ 191 คน โรเจอร์ อีเบิร์ต (Roger Eberts) นักวิจารณ์ชื่อดังที่ทั่วโลกให้การยอมรับ บอกว่า “เหมือนจับเอา แจ็กกี้ ชาน และ บัสเตอร์ คีตัน มาเจอกับ เควนทิน ทารันทิโน และ บักส์ บันนี่” ส่วน บิลล์ เมอร์เรย์ (Bill Murray) นักแสดงตลกอาวุโส กล่าวว่า “นี่คือหนังตลกที่ประสบความสำเร็จสูงที่สุดในยุคใหม่” ส่วน เจมส์ กันน์ (James Gunn) นั้นกล่าวยกย่องไว้อย่างเลิศเลอว่า “นี่คือหนังที่ยอดเยี่ยมที่สุดที่เคยสร้างมาก”</div>
        </div>
        <h3>คนเล็กหมัดเทวดา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span> </h3>
        <p class="w3-opacity">หนังจีน (ตลก | แอคชั่น)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 99 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>


    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">ดราม่า แอคชั่น ผจญภัย</h3>
    
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c43.jpg" alt="John" class="image">
            <div class="overlay">เป็นซีรีส์จีนอีกหนึ่งเรื่องที่มีทั้งบรรยากาศการถ่ายทำในรูปสวยมากและเนื้อเรื่องสนุกให้ลุ้นตามกันไป ซีรีส์จีนเรื่องนี้เล่าถึงเรื่องราวของนางเอกที่ถูกลอบฆ่า โดยนางเอกได้บังเอิญหยั่งรู้ว่าพระเอกสามารถต่อสู้กับศัตรูได้ ทั้งสองคนได้เริ่มทำงานร่วมกัน ช่วยเหลือซึ่งกันและกัน เกิดเป็นความสัมพันธ์ดี ๆ ที่รับรองว่าถูกใจคนชอบแนวโรแมนติก</div>
        </div>
        <h3>The Rise of Ning <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (ดราม่า | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTV </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c54.jpg" alt="Jane" class="image">
            <div class="overlay">เนื้อเรื่องเปิดเรื่องมาแรกๆ ออกจะเป็นแนวโรแมนติก แบบน่ารักหวาน ใสๆ พระเอกคือน่ารัก อบอุ่น แสนดีมาก รักนางเอกมากๆ พอรู้ว่าดวงชะตานางเอกต่อไปต้องประสบเหตุร้ายก็พร้อมจะช่วยด้วยชีวิต จากเนื้อเรื่องใสๆ หวานๆ หลังๆมาไม่รู้จะสงสารใครก่อนดี พบเจอแต่ละเรื่องหวังว่าพระนางจะร่วมมือกันและผ่านพ้นอุปสรรคต่างๆไปได้ด้วยดี บอกเลยว่าหลังๆเนื้อเรื่องเข้มข้นมาก</div>
        </div>
        <h3>วาสนารักมิอาจเร้น <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (โรแมนติก | ดราม่า | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการออกอากาศ : TrueID </p>
        <p class="w3-opacity">จำนวนตอน : 26 ตอน  </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c55.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวในปี พ.ศ. 2469 เป็นปีที่เปลี่ยนชีวิตของมู่หว่านชิงไปตลอดกาล หลังจากการตายของแม่ เธอนำเถ้ากระดูกกลับไปฝังที่ประเทศจีนและใช้ชีวิตร่วมกับครอบครัวใหม่ของพ่อ แรงจูงใจของมู่หว่านชิงคือการหาคำตอบว่าทำไมพ่อกับแม่ถึงแยกทางกัน รวมถึงสืบหาเรื่องการเสียชิตของพี่ชายที่เธอแทบจะไม่รู้จัก มู่หว่านชิงได้พบกับถานเสวียนหลิน ผู้บัญชาการทหารเซี่ยงไฮ้คนใหม่ และสวีกวงเย่า พี่ชายเพื่อนเล่นวัยเด็กซึ่งเป็นบุตรชายของผู้ตรวจการกองทัพที่มีอำนาจทว่าทั้งคู่กลับมีความรู้สึกลึกซึ้งต่อหว่านชิงและตัดสินใจที่จะใช้พลังและอำนาจเพื่อช่วยเธอ</div>
        </div>
        <h3>เพียงรักแรกพบ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : TrueID</p>
        <p class="w3-opacity">จำนวนตอน : 36 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c57.jpg" alt="Dan" class="image">
            <div class="overlay">ต้องบอกว่าเป็นซีรีสที่ดีมากก ร้องไห้ไปกับนางเอกหลายครั้ง เพราะนางเอกเป็นฝ่ายจำได้ก่อนและโดนพระเอกทำร้ายเนื่องด้วยความรักและความอยากปกป้องก็ตาม เป็นซีรีส์ยาวที่มีรายละเอียดปลีกย่อยเยอะเนื่องจาก เนื้อเรื่องจุดเริ่มต้นการช่วยชีวิตอีกคนจนถึงการแต่งงานและจุดเปลี่ยนที่ทั้งคู่เริ่มจำกันได้ และสุดท้ายการเสียสละชีวิต เรื่องนี้นอกจากเราจะสามารถอินกับพระเอก นางเอก ตัวละครบทสบทบก็ทำเอาอินตามไปด้วย เช่น สาวใช้ข้างตัวนางเอกที่คอยช่วยเหลือเสมอ หรืออาจารย์ที่ยอมสละชีวิตช่วยนางเอก แม่ทัพข้างพระเอก</div>
        </div>
        <h3>ตงกงตำหนักบูรพา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (ดราม่า | ย้อนยุคพีเรียด)</p>
        <p class="w3-opacity">ช่องทางการรับชม : WeTv / Netflix</p>
        <p class="w3-opacity">จำนวนตอน : 52 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c59.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องนี้เป็นซีรีส์แนวดราม่าที่ตับไม่พังมาก ดำเนินเรื่องเร็ว เข้าใจง่าย และสนุกทุกตอน โดยเปิดเรื่องด้วยความลำบากของนางเอกว่าโดนครอบครัวสามีรังแกอย่างไร และใครช่วยเหลือไว้ และทำไมถึงสวมรอยเป็นเจียงหลี คือดำเนินเรื่องตามลำดับขั้นได้ดีมาก ไม่ได้กระโดดไปมา และมีการปูพื้นตัวละครว่านางเอกและสามีรักกันมากด้วยใจจริง แต่ว่าเบื้องหลังของครอบครัวสามีมีคนมีอำนาจหนุนหลังอยู่ แต่มันเลวร้ายตรงที่สามีของนางเอกก็ร่วมมือด้วยนี่แหละ นางเอกก็เลยเก็บความแค้นไว้ บวกกับได้จังหวะสวมรอยจากที่ผู้มีพระคุณตาย ก็รวบทุกอย่างแก้แค้นให้ผู้มีพระคุณ และแก้แค้นให้ตัวเองด้วย</div>
        </div>
        <h3>เรียกข้าว่าคุณหนู <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์จีน (ดราม่า | ย้อนยุคพีเรียด)</p>
        <p class="w3-opacity">ช่องทางการรับชม : YOUKU / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 40 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c64.jpg" alt="John" class="image">
            <div class="overlay">หนังเล่าถึงเหตุการณ์ของจีนในช่วงรอยต่อ ก่อนจะแยกออกเป็นสามก๊ก เรื่องราวของฮ่องเต้ ที่ต้องการจะสมานฉันท์กับเมืองเพ่ยและเมืองจิ่ง แต่ความวุ่นวายก็เกิดขึ้น เพราะเหล่าขุนนางและแม่ทัพเกิดไม่พอใจขุนพลใหญ่ผู้หนึ่ง ได้กักขังเลี้ยงเด็กอยู่ในคุกใต้ดินตั้งแต่อายุ 8 ขวบ เพื่อให้เขาเป็นตัวตายตัวแทน เป็นเงา ของตัวเอง แต่เมื่อถึงเวลาต้องเรียกใช้งาน ทุกสิ่งทุกอย่างกลับไม่เป็นอย่างที่คิด สนุก ลึกลับ ใครชอบแนวนี้ต้องไปติดตามกันนะ</div>
        </div>
        <h3>จอมคนกระบี่เงา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 116 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c65.jpg" alt="Jane" class="image">
            <div class="overlay">หนังจีนกำลังภายในเอฟเฟกต์สุดตระการตา เรื่องราวของจีนในช่วงก่อนแผ่นดินสามก๊ก เริ่มต้นขึ้นโดย ตั๋งโต๊ะ หัวหน้าขุนนางที่ได้รวบรวมไพร่พล จนสามารถรัฐประหารยึดครองบัลลังก์จากฮ่องเต้ได้สำเร็จ เมื่อ ตั๋งโต๊ะ ขึ้นครองอำนาจ ก็ได้กดขี่จนประชาชนเดือดร้อนไปทุกหย่อมหญ้า โจโฉ เล่าปี่ กวนอู เตียวหุย ฯลฯ จึงเป็นตัวนำ 18 ขุนศึก รวบรวมกองกำลังเพื่อยึดอำนาจคืนมาให้ประชาชน จนเกิดเป็นมหาสงครามสุดมันแบบที่ต้องห้ามกะพริบตา</div>
        </div>
        <h3>สงครามขุนศึกสามก๊ก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | ย้อนยุค)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 118 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c66.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นเรื่องราวหลังจากสิ้นสุดสงครามระหว่างแคว้นจ้าวและแคว้นเหยียน เหตุการณ์นักฆ่ารอบปลงพระชนม์ฮ่องเต้ ท่านราชครูกวนจึงส่งสารออกไปยังพรรคทั้ง 8 ทั่วแคว้น จุดประสงค์เพื่อให้ทั้ง 8 พรรคส่งนักรบมากฝีมือเข้าร่วมประลองแย่งชิงความเป็นหนึ่งเพื่อครองตำแหน่งแม่ทัพใหญ่แห่งแคว้น มุ่งหน้าสู่เมืองเฟิ่งหวงเพื่อเข้าร่วมประลองในฐานะตัวแทนของพรรคชิงหยวนพร้อมกับจุดประสงค์แอบแฝงของทั้งคู่ พวกเขาพบเจอเพื่อนร่วมทีมตัวน้อย เสี่ยวเหม่ย ซึ่งมาพร้อมกับมิตรภาพที่ลึกซึ้ง หากอยากรู้เรื่องเป็นอย่างไรต่อไป ต้องติดตาม เนื้อเรื่องที่มีความเข้มข้น ครบรส ห้ามหลาด!</div>
        </div>
        <h3>พิภพสองหล้า <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | แฟนตาซี)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">ความยาว : 110 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c70.jpg" alt="Dan" class="image">
            <div class="overlay">สายบู๊..กังฟูดุเดือดห้ามพลาด! โดยมีนักแสดงสายแอคชั่นที่จะมาเพิ่มความเข้มข้นของการบู๊อย่าง “เฉินหลง” หรือ “แจ็คกี้ ชาน” เลยทำให้เกิดกระแสความอยากดูเข้าไปอีก ซึ่งเนื้อหากล่าวถึง เด็กวัยสิบสองปีซึ่งมีนามว่า เดร ปาร์กเกอร์ เขาก็สู่จุดหักเหเมื่อแม่ของเขาได้ย้ายที่อยู่เนื่องจากได้บรรจุงานใหม่ ที่บ้านหลังใหม่ในปักกิ่ง และที่แห่งนี้เอง เดรก็ได้ตกหลุมรักนักเรียนสาวคนหนึ่งซึ่งมีชื่อว่า เหมยอิง แต่ทั้งคู่ก็ปรับตัวเข้าหากันได้ยาก เนื่องจากความแตกต่างทางวัฒนธรรม และพ่อของเหมยอิงเองก็ไม่เห็นด้วยกับความสัมพันธ์ของเขาดูเหมือนว่าสถานการณ์ย่ำแย่ลงไปอีก เฉิงภาพยนตร์แอคชั่นที่จะทำให้แฟน ๆ สนุก และยิ้มไปตาม ๆ กัน</div>
        </div>
        <h3>เดอะ คาราเต้ คิด <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | เด็กและครอบครัว)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Apple TV </p>
        <p class="w3-opacity">ความยาว : 140 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/c72.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวของ “ศาสตราจารย์เฉิน” ผู้เชี่ยวชาญด้านโบราณคดีที่ตรวจพบว่าพื้นผิวของวัตถุโบราณที่นักเรียนของตน นำมานั้นมีลักษณะคล้ายกับหยกที่ผู้หญิงในฝันของเขาถืออยู่ในมือมากๆ ท่ามกลางความมืดมนเขารู้สึกว่าคนทั้ง 2 จะต้องมีความเกี่ยวข้องกันอย่างแน่นอน ศาสตราจารย์เฉินและทีมงานจึงเริ่มลงมือสำรวจ และพบด้วยความประหลาดใจว่าการทำงานครั้งนี้ยังนำเขาไปสู่เรื่องราวการผจญภัยที่เต็มไปด้วยความลึกลับซับซ้อนของวัดโบราณใต้ธารน้ำแข็งและเมื่อศาสตราจารย์เฉินได้เห็นเมิ่งหยวนที่นี่ทุกอย่างก็กลายเป็นความจริงในที่สุด </div>
        </div>
        <h3>ตำนานฟัดทะลุเวลา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังจีน (แอคชั่น | ผจญภัย)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Movie Copyright </p>
        <p class="w3-opacity">ความยาว : 129 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
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

    <style>
        .favorited {
            color: red; /* เปลี่ยนสีหัวใจเมื่อถูกกด */
        }
    </style>

</body>
</html>