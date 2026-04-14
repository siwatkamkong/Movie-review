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
      <main id="main"></main>
    </div>
  </div>
  
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <div class="container">
  <img class="w3-image" src="img/ปกไทย.jpg" alt="Architecture" width="1500" height="800">
  <div class="overlay">หนังยอดฮิตประจำเดือน</div>
  <div class="w3-display-middle w3-margin-top w3-center">
</header>

<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">โรแมนติก คอมเมดี้</h3>

<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt1.jpg" alt="John" class="image">
            <div class="overlay">เคยตั้งคำถามกับตัวเองไหม ว่าทำไมเราถึง ‘โสด’, บางคนโสดเพราะขี้บ่น, บางคนโสดเพราะเจ้าชู้, บางคนโสดเพราะอินดี้แต่กับ หลินเธอโสดเพราะ “เห็นผี” เมื่อหัวใจโดนเทก็เลยเซไปหาทางเยียวยา…“เริ่มที่ไหนจบที่นั่น” นั่นคือเหตุผลที่ทำให้ “หลิน” ขอลุยเดี่ยวจัดทริปรักษาแผลใจ ณ กิ่วแม่ปาน จนได้เจอกับ “พุธ” นักเขียนบทไอเดียตัน ที่จำเป็นต้องใช้ “คนเห็นผี” มาช่วย  การผจญภัยในช่วงชีวิตโลว์ๆ ของทั้งสองจึงเริ่มขึ้น</div>
        </div>
        <h3>สุขสันต์วันโสด<span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'สุขสันต์วันโสด', 'img/tt1.jpg')"></span> </h3> 
        <p class="w3-opacity">หนังไทย (โรแมนติก | คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 125 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt2.jpg" alt="Jane" class="image">
            <div class="overlay">ตั้งแต่เด็ก 'ชัช'  คิดมาตลอดว่าน้องที่อยู่ในท้องแม่คือ น้องชาย พอถึงวันที่แม่คลอดแล้วกลายเป็นน้องสาว ชัชจึงเซ็งระดับสิบ ชัชกับเจนตีกันได้ทุกเรื่อง เพราะเจนชอบทำตัวเหมือนเป็นแม่มากกว่าเป็นน้อง ส่วนชัชก็ชอบทำตัวเป็นภาระมากกว่าเป็นพี่ จะมีพี่ชายคนไหนที่ห่วยกว่าน้องสาวไปซะทุกด้าน ไม่ว่าจะเป็นเรื่องการเรียน กีฬา หน้าตา นิสัย แข่งกันยังไง เจนก็เพอร์เฟคกว่า  </div>
        </div>
        <h3>น้อง.พี่.ที่รัก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (โรแมนติก | คอมเมดี้ | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 124 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt4.jpg" alt="Mike" class="image">
            <div class="overlay"> “เมตตา” แฟนสาวผู้กำลังหมดเมตตา เตรียมบอกลา “สติ” แฟนหนุ่มไร้สติเพราะดันความจำเสื่อม” และ “นะโม ลูกสาวที่แทบจะท่องนะโมให้ตัวเองวันละ 3 จบ เพราะต้องพบกับความวุ่นวายของพ่อแม่ตลอดมา   นี่คือหนังรักที่ชวนทุกคนร่วมย้อนความทรงจำความรักผ่านรูปถ่าย เพื่อกลับไปพบกับจุดเริ่มต้นของความรัก หรือ เลิกรัก </div>
        </div>
        <h3>หนัง ลอง ลีฟ เลิฟว์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (โรแมนติก | คอมเมดี้ | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 135 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt3.jpg" alt="Dan" class="image">
            <div class="overlay">เรื่องราวของ ทองคำ และ เสก คู่รักเกย์ผู้อุทิศตนทำงานอย่างไม่รู้จักเหน็ดเหนื่อยเพื่อสร้างชีวิตร่วมกัน จนมีทั้งบ้านและสวนทุเรียน ทว่าโศกนาฏกรรมกลับเกิดขึ้น เมื่อเสกเสียชีวิตกะทันหัน และต้องพบกับความจริงที่ว่าการสมรสเพศเดียวกันยังไม่ถือว่าเป็นคู่แต่งงานตามกฎหมายไทย เมื่อการสมรสเท่าเทียมยังไม่ได้รับการยอมรับ ทำให้ทองคำไม่มีสิทธิ์ในทรัพย์สินที่เขากับเสกร่วมสร้างกันมา บ้านและสวนทุเรียนทั้งหมด กรรมสิทธิ์ตกเป็นของแม่เสก </div>
        </div>
        <h3>วิมานหนาม <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (โรแมนติก | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 125 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt5.jpg" alt="Mike" class="image">
            <div class="overlay">น้ำสาวน้อย ม.1 วัย 14 หน้าตาธรรมดา ๆ และไม่สวย แต่เธอไปแอบชอบ พี่โชน พี่ม.4 ที่หล่อ เท่ ที่สุดในโรงเรียน แล้วแถมยังใจดีอีกต่างหากทำให้น้ำมีคู่แข่งเป็นสาว ๆ ทั้งม.ต้นและม.ปลาย ที่มีแต่คนสวย ๆ เต็มไปหมด แต่น้ำไม่ยอมแพ้ง่าย ๆ เธอพยายามลุยทำทุกอย่าง สู้ทุกรูปแบบเพื่อที่จะเก่งและสวย แล้วเด่นขึ้นในโรงเรียนให้ได้ เพราะแอบหวังในใจเล็ก ๆ ว่าถ้าทำสำเร็จพี่โชนอาจจะหันมามองเธอซักครั้ง</div>
        </div>
        <h3>สิ่งเล็กเล็กที่เรียกว่า...รัก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ฟินจิกหมอน | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 118 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt6.jpg" alt="John" class="image">
            <div class="overlay">'กัส' ตุ๊ดสาวร่างเล็กผู้คร่าหวอดในวงการศัลยกรรม และ แก๊งค์เพื่อนของเธอ อย่าง 'กอล์ฟ' ตุ๊ดร่างยักษ์ผู้รักการเต้นเป็นชีวิตจิตใจ 'คิม' ตุ๊ดล่าก้ามปู สจ๊วตผู้ผันตัวเองจากฝ่ายรับมาเป็นฝ่ายรุกตามความต้องการของตลาดเก้งกวาง และ 'แนตตี้' พริตตี้สุดเอ๋อ ชะนีหนึ่งเดียวของกลุ่ม เมื่อทั้งสามถูกชายคนรักหักอกพร้อมๆกันอย่างไม่ใยดี ภารกิจตามหารักแท้ของสามตุ๊ดตัวแม่จึงเริ่มต้นขึ้น พบกับ เรื่องราวสุดแซ่บ และแขกรับเชิญมากมาย ที่ยกขบวนมาสร้างความเผ็ดส์ระดับ พริกสิบเม็ดให้กับชีวิตของแก๊งเพื่อนทั้งสี่ทั้งหมดนี้ในไดอารี่ตุ๊ดซี่ส์เดอะซีรีส์</div>
        </div>
        <h3>ไดอารีตุ๊ดซีส์ เดอะซีรีส์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (โรแมนติก | ดราม่า | คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน  : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt7.jpg" alt="Jane" class="image">
            <div class="overlay">  หลังจาก 'กัส' โพสต์เล่าเรื่องราวของแพร์รี่ลงเฟซบุ๊ค…เวลาผ่านไป 2 ปี กัสกลายเป็นที่รู้จักในฐานะ "คุณช่า" นักเขียนดังจากเพจบันทึกของตุ๊ด แฟนเพจที่กัสนำเรื่องพังๆ ของเพื่อนๆอย่าง 'กอล์ฟ' 'คิม' และ 'แนตตี้' มาเล่าให้เหล่าแฟนๆ ในเพจฟังอย่างสนุกสนาน ปีนี้พวกนางจะกลับมาพร้อมเรื่องราวที่ แซ่บ แรด ปัง แบบยกกำลังสอง และที่สำคัญหลังจากนกกันยกแก๊ง ก็ถึงเวลาสักทีที่เพื่อนสาวทั้งสี่จะมี “ผู้”!!!!</div>
        </div>
        <h3>ไดอารีตุ๊ดซีส์ ซีซั้น2 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : GMM25 / Netflix </p>
        <p class="w3-opacity">จำนวนตอน  : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt8.jpg" alt="Mike" class="image">
            <div class="overlay">ในโลกที่เต็มไปด้วยความโหดร้ายนี้ พลังวิเศษที่จะทำให้คนกลายเป็นยอดมนุษย์ได้ก็คือ พลังของความใจดี และยอดมนุษย์คนนี้มีชื่อว่า มาตาลดา      มาตาลดา ลูกสาวคนเดียวของ เกริกพล หรือ เจ๊เกรซ เจ้าของ The Cage บาร์ชื่อดังในพัทยา ที่หอบลูกสาวหนีมาอยู่ที่พัทยาตั้งแต่ยังเล็ก เพราะโดน เปา และ เฟิน ไล่ออกจากบ้าน ตัดพ่อตัดลูก เพียงเพราะเขาไม่ใช่ผู้ชาย! แต่มาตาลดานั้นกลับโตมาอย่างดีด้วยความรักจากพ่อเกรซ วีนัส, คิตตี้, โจลี และ เจนนี น้าๆในคณะโชว์ ครอบครัวที่ดูประหลาดๆ แต่กลับเต็มเปี่ยมไปด้วยพลังวิเศษมากมาย </div>
        </div>
        <h3>มาตาลดา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | โรแมนติก | ฟีลกู้ด )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 21 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt9.jpg" alt="Dan" class="image">
            <div class="overlay"> เกศสุรางค์ หญิงสาวเจ้าเนื้อจำต้องทะลุมิติไปในแผ่นดินกรุงศรีอยุธยาในรัชสมัยขุนหลวงนารายณ์ (สมเด็จพระนารายณ์มหาราช) โดยได้เข้าร่างของแม่หญิงการะเกด สตรีสูงศักดิ์ผู้แสนร้ายกาจที่กำลังหมดวาสนา โดยเกศสุรางค์ผู้มาจากอนาคตได้รับรู้ชะตากรรมบ้านเมืองในสมัยนั้นจากสิ่งที่ตนเคยเรียน อีกทั้งยังได้พบและใกล้ชิดกับบุคคลผู้มีตัวตนจริงในหน้าประวัติศาสตร์ เช่น พระโหราธิบดี เจ้าพระยาโกษาธิบดี เจ้าพระยาวิไชเยนทร์ ท้าวทองกีบม้า หลวงสรศักดิ์ รวมทั้งเหตุการณ์ผลัดไปสู่แผ่นดิน สมเด็จพระเพทราชา ที่วุ่นวายเพราะชาวต่างชาติมีอิทธิพลมากโดยเฉพาะเรื่องหัวใจ</div>
        </div>
        <h3>บุพเพสันนิวาส <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (พีเรียด | ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">จำนวนตอน  : 15 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt10.jpg" alt="Mike" class="image">
            <div class="overlay">พุดตาน สาวน้อยผู้ชื่นชอบการจัดสวน ชีวิตของเธอต้องประสบความสูญเสีย เมื่อพ่อแม่เกิดอุบัติเหตุเสียชีวิตตอนเธออายุได้แปดขวบ พุดตานต้องอยู่ในความดูแลของ วิภาวี ผู้เป็นป้า เมื่อเติบโตขึ้นโชคชะตาเหมือนจะลิขิตเธอไปยังอดีตชาติที่เธอผูกพัน...วันหนึ่งระหว่างที่พุดตานกำลังจัดสวนที่ไซต์งานอยุธยา คนงานขุดพบหีบโบราณลึกลับ เธอตัดสินใจเปิดหีบกล่องนั้น ข้างในมีสมุดข่อยโบราณถูกเก็บไว้ ทันทีที่เธอสัมผัสสมุดข่อย ก็เกิดแสงสว่างวาบและร่างของเธอก็หายไปลับตา... </div>
        </div>
        <h3>พรหมลิขิต 2 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (พีเรียด | ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน  : 26 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>

    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 heading">ดราม่า</h3>
    
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt11.jpg" alt="John" class="image">
            <div class="overlay">เอ็ม ตัดสินใจดรอปเรียนตอนปีสี่ เพื่อมาเอาดีทางการแคสต์เกมแต่ทำยังไงก็ไม่รุ่ง เอ็มเลยคิดว่าจะรวยด้วยการทำงานสบายๆ แบบ มุ่ย ลูกพี่ลูกน้อง ที่รับหน้าที่ดูแลอากงที่ป่วยระยะสุดท้าย จนกลายเป็นทายาทเพียงคนเดียวที่ได้รับมรดกเป็นบ้านราคากว่าสิบล้าน   เส้นทางเศรษฐีอยู่ตรงหน้า เอ็มจึงอาสาไปดูแลอาม่าที่ตรวจพบว่าเป็นมะเร็ง </div>
        </div>
        <h3>หลานม่า <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | แฟมิลี่ )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 125 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt12.jpg" alt="Jane" class="image">
            <div class="overlay">โดยเล่าผ่านความทรงจำของบิลลี่ อดีตนักศึกษาอาชีวะที่ผันตัวมาเป็นพ่อเลี้ยงเดี่ยวกับลูกสาววัยรุ่นของเขา แม้ว่าความสัมพันธ์ระหว่างพ่อกับลูกสาวจะไม่ค่อยดีนัก แต่เมื่อลูกสาวของเขาได้รับบาดเจ็บจากการต่อสู้ของแก๊งเด็กอาชีวะ ทำให้บิลลี่หวนนึกถึงอดีตของตัวเองและเพื่อน ในยุค 90 มีวิทยาลัยอาชีวะชื่อดังมากมาย</div>
        </div>
        <h3>4KINGS <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | อาชญากรรม)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 139 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt13.jpg" alt="Mike" class="image">
            <div class="overlay">'จีน' ต้องการจะเคลียร์บ้านเพื่อรีโนเวท มหกรรมการโละของออกจากบ้านจึงเกิดขึ้น อะไรที่ไม่ใช้แล้ว อะไรที่ทิ้งไว้ก็รก เธอตัดสินใจจะทิ้งให้หมดเลย แต่เมื่อเธอได้เจอกับของบางอย่างที่เป็นของ 'เอ็ม' แฟนเก่าของเธอ (ซันนี่ สุวรรณเมธานนท์) จีนเริ่มพบว่าการทิ้งครั้งนี้ไม่ง่าย เพราะของบางอย่างแม้จะไม่มีประโยชน์แล้ว แต่มันยังมีเรื่องราวให้นึกถึง มีอดีตที่ยังค้างคา มีความรู้สึกบางอย่างที่ไม่สามารถแค่ทิ้งลงถุงดำแล้วหายไป จีนจึงต้องตัดสินใจว่าจะทําอย่างไรกับสิ่งของของเอ็ม เธอจะทิ้งไป เก็บไว้ หรือเดินไปคืน ถึงจะเป็นการทิ้งที่สมบูรณ์ที่สุด </div>
        </div>
        <h3>ฮาวทูทิ้ง <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 113 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt14.jpg" alt="Dan" class="image">
            <div class="overlay">'เด่นชัย' เจ้าหน้าที่ไอทีสุดเนิร์ดประจำออฟฟิศ วัย 30 ผู้จะมีตัวตนในสายตาพนักงานคนอื่นแค่เวลาอุปกรณ์คอมพิวเตอร์เสีย ในชั่วโมงทำงานที่แสนเร่งรีบไม่มีใครสนใจแม้แต่จะจำชื่อของเด่นชัยจาเขาแอบน้อยใจอยู่บ่อยๆ จนกระทั่งวันที่เขาได้ไปซ่อมปรินเตอร์ให้ 'นุ้ย' มาร์เก็ตติ้งสาวคนสวยผู้จดจำชื่อจริงของเขาได้เด่นชัยตกหลุมรักความน่ารักและจริงใจของนุ้ยที่ทำให้เขารู้สึกเหมือนมีตัวตนขึ้นมา แต่ก็ทำได้เพียงเฝ้าเก็บรายละเอียดและดูแลเธออยู่ห่างๆ เพราะรู้ดีว่าหมาอย่างเขาคงได้แค่แหงนมองเครื่องบิน</div>
        </div>
        <h3>แฟนเดย์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 136 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt15.jpg" alt="Mike" class="image">
            <div class="overlay">ภาพยนตร์ที่จะพาทุกคนย้อนกลับไปในปี พ.ศ. 2542 พร้อมเติบโตและเรียนรู้เรื่องราวความรักไปกับ “ต๋อง” เด็กผู้ชายในวัย 16 หัวโจกของแก๊งสุดห่ามประจําโรงเรียน และแก๊งเพื่อนอย่าง “โด่ง”, “แบงค์”, ไม้ และ “เปา” ที่มักจะก่อวีรกรรมสุดป่วนสร้างความปวดหัวให้กับเหล่าครูในโรงเรียนอยู่เสมอ แต่แล้ววันหนึ่ง “ต๋อง” และเพื่อนๆ เกิดนึกสนุกเล่นพิเรนทร์กลางห้องเรียน จนทําให้ “ต๋อง” ถูกทําโทษด้วยการย้ายมานั่งอยู่หน้า “หลิน” นักเรียนดีเด่นประจําโรงเรียนที่ทั้งน่ารักและเรียนเก่ง </div>
        </div>
        <h3>รักแรก โคตรลืมยาก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (โรแมนติก | คอมเมดี้ | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 120 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt16.jpg" alt="John" class="image">
            <div class="overlay">ปี 2435 ยุคสมัยที่การค้าประเวณีรุ่งเรืองที่สุด เรื่องราวของสามดอกไม้งามแห่งหอบุปผชาติ กุหลาบ,โบตั๋น และ เทียนหยด ซึ่งอยู่ภายใต้การปกครองของ แม่ราตรี แม่เล้าผู้ทรงอิทธิพลโดยมีแขกประจำคนสำคัญ นั่นก็คือ พระยาจรัล ผู้ที่มีอำนาจในบ้านเมือง แต่ชีวิตในหอบุปผชาติ หาได้ใช่ความปรารถนาของสามสาวไม่ พวกเธออยากจะโบยบินเป็นอิสระ เพื่อทำตามความฝันของตัวเอง ทั้งสามคน จึงต้องพยายามหาเงิน เพื่อมาไถ่ถอนตัวเอง ออกจากการเป็น “นางคณิกา”</div>
        </div>
        <h3>บางกอกคณิกา <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (อิงประวัติศาสตร์ | ดราม่k)</p>
        <p class="w3-opacity">ช่องทางการรับชม : oneD </p>
        <p class="w3-opacity">จำนวนตอน : 8 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt17.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นเรื่องราวของ นนท์ เพลย์บอยหนุ่มตัวพ่อ ผู้ไม่เคยศรัทธาในความรัก ใช้ชีวิตรักสนุก แต่ไม่ผูกพันฉบับ One Night Stand ท่ามกลางสมรภูมิรักอันเร่าร้อนของ นนท์ในทุกค่ำคืนเต็มเปี่ยมไปด้วยความฟิตปั๋ง จนกระทั่งการปรากฎตัวของ กานตา ผู้ที่ถูกเบื้องบนส่งลงมาทำภารกิจ เธอมาพร้อมกับคำสาปที่ทำให้ความเป็นชายของนนท์ถึงกับเหี่ยวจนเฟี้ยวไม่ออก ภารกิจตามหาความรักของ “เขา” จะใช่ “เธอ” คนนี้ คนนั้น หรือว่า คนไหน มาร่วมลุ้นและเอาใจช่วยไปพร้อมกัน</div>
        </div>
        <h3>แบบฝึกรักไม่รู้ล้ม <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : GMM25 / Netflix       </p>
        <p class="w3-opacity">จำนวนตอน : 8 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt18.jpg" alt="Mike" class="image">
            <div class="overlay">ท่ามกลางบรรยากาศสายลมและแสงแดดของเมืองภูเก็ตเพื่อนสมัยเด็กที่ห่างหายกันไปหลายปีอย่าง “เต๋” และ “โอ้เอ๋ว” โคจรกลับมาเจอกันอีกครั้งที่โรงเรียนกวดวิชาภาษาจีน เพื่อเตรียมสอบแอด มิชชันเข้ามหาวิทยาลัย แต่ในเมื่อต่างฝ่ายต่างมุ่งมั่น จะสอบเข้าคณะนิเทศศาสตร์ของมหาวิทยาลัยเดียวกัน เพื่อนรักที่เคยร่วมฝัน จึงกลับกลายมาเป็นคู่แข่งคนสำคัญเมื่อยิ่งสำคัญ ก็ยิ่งอยู่ในสายตา... การที่เต๋และโอ้เอ๋วได้กลับมาใกล้กันอีกครั้ง ทำให้ทั้งสองได้รู้จักกันและกันมากขึ้น จนได้นำพาไปสู่ความรู้สึกใหม่ ที่ต่างก็ไม่เคยรู้สึกมาก่อน </div>
        </div>
        <h3>แปลรักฉันด้วยใจเธอ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : ไลน์ทีวี / Netflix</p>
        <p class="w3-opacity">จำนวนตอน : 5 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt19.jpg" alt="Dan" class="image">
            <div class="overlay"> ซีรีส์เรื่องนี้จะเป็นเรื่องราวที่เกิดขึ้นในยุค 70 ติดตามเรื่องราวของ หมอนัท แพทย์ผิวหนังและกามโรคที่มีความฝันอยากจะเป็นนักเขียนนิยายลงบนหน้าหนังสือพิมพ์ เขาพยายามที่จะเขียนนิยายและได้ติดต่อไปยัง ทองเทียน นักเขียนนิยายประจำของหนังสือพิมพ์บางกอกทันข่าว เพื่อขอให้ส่งนิยายของเขาให้กับบก. แต่แล้วการเขียนนิยายของเขาก็ได้ถูกปัดตกไป เพราะตอนนี้บางกอกทันข่าวกำลังพยายามที่จะทำคอลัมน์ใหม่เพื่อเพิ่มยอดขายให้กับหนังสือพิมพ์โดยหวังที่จะขึ้นไปเป็นที่หนึ่งของวงการ</div>
        </div>
        <h3>ดอกเตอร์ไคลแมกซ์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (คอมเมดี้ | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 8 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt20.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวของสามเพื่อนสนิท2หนุ่ม และ1สาวไฟแรงที่ต้องหาทางใช้หนี้ก้อนโตหลังสตาร์ทอัพของพวกเขาล้มไม่เป็นท่า จังหวะนั้นเองพวกเขาก็บังเอิญค้นพบโอกาสทางธุรกิจ ที่จะช่วยพวกเขาปลดหนี้ก้อนใหญ่โดยอาศัยช่องทางการหาเงินจากความศรัทธาในศาสนาของผู้คนโดยมี วิน เด็กหนุ่มผู้เรียนไม่จบวิศวะคอม รับหน้าที่เป็นมันสมองของทีมในการวางแผนการตลาด ในขณะที่เพื่อนสนิทอย่างเดียร์ ดีไซเนอร์สาวมากฝีมือผู้เชี่ยวชาญการทำกราฟฟิคและออแกไนซ์ เข้ามาดูแลในด้านพีอาร์ และ เกม วัยรุ่นสร้างตัวฐานะร่ำรวยที่พร้อมลุยทุกสถานการณ์รับหน้าที่เป็นนายทุนคนสำคัญ</div>
        </div>
        <h3>สาธุ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ดราม่า | อาชญากรรม )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 9 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>


    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">ระทึกขวัญ สยองขวัญ</h3>
    
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt21.jpg" alt="John" class="image">
            <div class="overlay">ธี่หยด สร้างจากเรื่องสยองขวัญที่โพสต์บนพันทิป เมื่อปลายเดือนพฤษภาคม 2558 ซึ่งมีความคิดเห็นมากกว่า 2,000 ความเห็น และส่งต่อกว่า 130,000 ครั้ง เรื่องนี้ถูกเขียนใหม่เป็นนวนิยายที่ออกในปี 2560 โดยผู้เขียนคนเดียวกัน เพียงไม่กี่เดือนก่อนที่หนังจะเข้าฉายก็มีการเล่าอีกครั้งในรายการ The Ghost Radio รายการผียอดนิยมบนโลกออนไลน์ กฤตนนท์ ผู้เขียนอ้างว่าเป็นเรื่องจริงที่เกิดขึ้นกับครอบครัวแม่ของเขาในอดีตตอนที่เธออายุ 15 ปี ในจังหวัดกาญจนบุรี</div>
        </div>
        <h3>ธี่หยด <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญเหนือธรรมชาติ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 121 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt22.jpg" alt="Jane" class="image">
            <div class="overlay"> เรื่องราวที่ต่อจากไทบ้าน เดอะซีรีส์ 2.2 เล่าถึงชีวิต เจิด เด็กหนุ่มวัย 25 ปีที่เรียนจบกฎหมายมา 7-8 ปี มีพ่อทำอาชีพสัปเหร่อ เขาหวังจะไปสอบเป็นทนายหรือปลัดอำเภอ แต่ต้องมาช่วยพ่อเป็นสัปเหร่อ เพราะมีอาการป่วยจนต้องมาช่วยพ่อทำงาน แต่ลังเลเพราะเขาเป็นคนที่กลัวผีที่ต้องมาทำศพแทนพ่อ</div>
        </div>
        <h3>สัปเหร่อ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญ | ตลก | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 125 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt23.jpg" alt="Mike" class="image">
            <div class="overlay">หลังจากผ่านพ้นศึกล้างคําสาปแห่งปฐมบทพี่นาค โทมินจุน เซเลบลูกครึ่งไทย-เกาหลี ได้มีโอกาส กลับมาบ้านเกิดในวัยเยาว์ เพื่อช่วยบูรณะโบสถ์เก่าแก่ของวัดประจําชุมชน โดยไม่ลืมควงแขน บอลลูน กับ เฟิร์ส ได้รับการอวยยศเป็นผู้จัดการส่วนตัวคุณโทก็มาที่นี่ด้วยเช่นกัน แค่ก้าวแรกที่เดินเข้ามา สัญญาณแห่งความอาฆาตจากผีพี่นาคภายใต้หน้ากากสยอง ก็พุ่งเป้ามาที่คุณโทอย่างจัง คําสัญญาและความเกลียดชังกําลังก่อตัวขึ้นจากความทรงจําในอดีตที่ถูกลืมเลือน</div>
        </div>
        <h3>พี่นาค 4 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญ | คอมเมดี้ )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 111 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt24.jpg" alt="Dan" class="image">
            <div class="overlay">หนิงและกวิน พ่อแม่ลูกหนึ่ง ตัดสินใจปล่อยบ้านของตนให้เช่าแก่ ราตรี เขมารักษ์ แม้ในตอนแรกกวินจะไม่เห็นด้วยก่อนจะเปลี่ยนใจยินยอมหลังได้พูดคุยกับราตรี เมื่อทั้งสามได้ย้ายออกไปอยู่หอพัก เพื่อนบ้านได้ส่งข้อความพร้อมแนบรูปภาพของราตรีกำลังประกอบพิธีกรรมบางอย่างโดยการนำเครื่องรางจากขนอีกาและซากศพของอีกามาประดับรอบบ้าน และทุกตีสี่ของทุกคืน จะมีเสียงสวดประหลาดดังออกมา ในขณะที่หนิงพยายามตามหาความจริงของผู้เช่า เธอสงสัยว่ากวินอาจจะเป็นส่วนหนึ่งของ "ลัทธิ" ดังกล่าว</div>
        </div>
        <h3>บ้านเช่า บูชายัญ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญเหนือธรรมชาติ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 124 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt25.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวของตระกูลเทวสถิตย์ไพศาล ตระกูลมหาเศรษฐีทรงอิทธิพล เมื่อรุ่งโรจน์ผู้นำตระกูลได้เสียชีวิตอย่างปริศนาในคฤหาสน์หลังใหญ่ของตระกูล หลังจากประกาศให้ ไข่มุก สาวใช้คนสนิทเป็นภรรยาคนใหม่ของเขาแม้ว่าสมาชิกแต่ละคนในตระกูลจะไม่เห็นด้วย แต่ก็ไม่สามารถคัดค้านได้ หลังจากรุ่งโรจน์เสียชีวิต เหล่าคนรับใช้ต้องเผชิญกับการถูกทารุณกรรมและรังแกอย่างหนัก ไข่มุกเชื่อว่าการเสียชีวิตของรุ่งโรจน์เกิดจากการถูกฆาตกรรมโดยคนในครอบครัว ด้วยความมุ่งมั่น เธอจึงเริ่มสืบหาหลักฐานเพื่อพิสูจน์ว่าใครคือฆาตกรตัวจริง รวมถึงคนรับใช้ที่อาจมีส่วนเกี่ยวข้องเพราะความแค้น</div>
        </div>
        <h3> สืบสันดาน <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ระทึกขวัญ | ชีวิต )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 124 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt26.jpg" alt="John" class="image">
            <div class="overlay"> อังคารคลุมโปง" ประกอบด้วยซีรีส์เรื่องสั้น 8 ตอน ที่เต็มไปด้วยดราม่าเข้มข้นสอดแทรกความเชื่อเกี่ยวกับโลกวิญญาณ สิ่งลี้ลับ อาถรรพ์ต่างๆ โดยแต่ละเรื่องที่คัดสรรมาสร้างเป็นซีรีส์นั้น มาจากเรื่องผีตอนที่ว่ากันว่าสนุก น่ากลัว และถูกพูดถึงบนโลกออนไลน์ จากเรื่องผีที่เคยอยู่แต่ในจินตนาการ นำมาสร้างเป็นภาพเคลื่อนไหวหลอนๆ ให้แฟนๆ ได้ติดตามกัน  ให้สัมผัสถึงความรู้สึกไม่น่าไว้วางใจ อึดอัด ชวนระแวดระวังตัวอยู่ตลอดเวลา ทำให้ผู้ชมร่วมลุ้นระทึกไปพร้อมๆ กัน</div>
        </div>
        <h3>อังคารคลุมโปง <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 8 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt27.jpg" alt="Jane" class="image">
            <div class="overlay">EP.1 : นักล่าแต้ม (Pregnant) เปิดตัวด้วยประเด็น "ท้องในวัยเรียน" ที่เหมือนว่าฝ่ายหญิงต้องเสียอนาคต แต่ฝ่ายชายดันใช้ชีวิตปกติเหมือนไม่เกิดอะไรขึ้น ดูเผินๆ ตอนนี้มีความคล้ายตอน "The Ugly Truth" ในซีซั่นแรก แต่ถ้าวิเคราะห์ดูดีๆ ตอนนี้มีความแฟนตาซีมากกว่าพอสมควรเดินเรื่องคล้าย The Ugly Thruth แต่หนักแน่นขึ้นในประเด็นที่จะเล่า ช่วงท้ายไปจนถึงบทสรุป ยอดเยี่ยมมาก สามารถดึงความแฟนตาซีลงมาเป็นความจริงได้อย่างแยบยลและชาญฉลาด วลีเด็ด "พี่รู้พี่มันเลว.น้องรัก"</div>
        </div>
        <h3>เด็กใหม่ The Series <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ระทึกขวัญ| รหัสคดี )</p>
        <p class="w3-opacity">ช่องทางการรับชม : GMM25 / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 21 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt28.jpg" alt="Mike" class="image">
            <div class="overlay">สามปีก่อนได้เกิดเหตุฆาตกรรมสะเทือนขวัญ เมื่อมีฆาตกรโรคจิตได้สังหาร “พิมพ์ดาว” ภรรยาของตํารวจสาย สืบ “อารัญ”  ขณะที่เธอพยายามหนีเอาตัวรอด เธอได้โทรศัพท์ขอความช่วยเหลือไปยังหน่วยรับแจ้งเหตุฉุกเฉิน  ซึ่ง “ไอริน”  เป็นผู้รับสายแจ้งเหตุนั้น  ไอริณจึงเป็นผู้ที่ได้ยินเสียงเหตุการณ์ที่เกิดขึ้นทั้งหมด  และในคืนเดียวกัน พ่อของเธอที่เป็นตำรวจสายตรวจก็ถูกฆาตกรซึ่งเธอเชื่อว่าเป็นคนเดียวกันกับคนที่ฆ่าพิมพ์ดาวภายหลังผ่านไป เจ้าหน้าที่ตํารวจได้จับตัว “ไอ้บอม”  ที่เชื่อว่าเป็นฆาตรกรมาขึ้นศาล </div>
        </div>
        <h3>สัมผัสเสียงมรณะ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ระทึกขวัญ | อาชญากรรม )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt29.jpg" alt="Dan" class="image">
            <div class="overlay">เมื่อ ‘คราม’ เด็กหนุ่มวัย 18 ปี พร้อมด้วยเพื่อนนักเรียนจากโรงเรียนเอกชนชื่อดังประจำเกาะปินตู เกาะเล็ก ๆ เกาะหนึ่งทางตอนใต้ของไทย ได้กลายเป็นผู้รอดชีวิตจากภัยพิบัติสึนามิครั้งใหญ่ในฝั่งทะเลอันดามันทำให้นักเรียนสามสิบกว่าชีวิตต้องพยายามเอาตัวรอดอยู่บนเกาะที่เต็มไปด้วยซากปรักหักพังนี้ให้ได้ ในระหว่างที่ความช่วยเหลือยังไม่มีวี่แววว่าจะมาถึง นอกจากการต้องต่อสู้กับความลำบาก หลังภัยพิบัติครั้งใหญ่กันโดยลำพังแล้ว เด็ก ๆ ยังต้องรับมือกับเหตุการณ์ปริศนาที่เริ่มจะแปลกประหลาดขึ้นเรื่อย ๆ</div>
        </div>
        <h3>เคว้ง <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ระทึกขวัญ | จินตนิมิต )</p>
        <p class="w3-opacity">ช่องทางการรับชม : GMM25 / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 7 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/tt30.jpg" alt="Mike" class="image">
            <div class="overlay">ใครจะคิดว่าการอยากเป็นเซ็นเตอร์ทีมเชียร์ลีดเดอร์ จะนำความระทึกขวัญมาเสิร์ฟถึงที่ ! เรื่องราวอื้อฉาวของชมรมเชียร์ลีดเดอร์ของ ม. ดังแห่งหนึ่ง เมื่อถึงวันคัดเลือกเซ็นเตอร์ประจำทีมเชียร์ลีดเดอร์มหาวิทยาลัย ทุกคนต่างแข่งขันกันเพื่อให้ได้ตำแหน่งนี้มาครอบครอง ด้านมืดในจิตใจของแต่ละคนเริ่มเปิดเผย เมื่อตำแหน่งที่ทุกคนต่างหมายปองนั้นใกล้เข้ามา สงครามการเชือดเฉือนด้วยความชังจึงเกิดขึ้น จนนำไปสู่การทำคุณไสย พร้อมกับเหตุการณ์ลี้ลับที่เกิดขึ้นกับสมาชิกในทีมที่ยากจะหาคำตอบและที่มาของเหตุการณ์นั้น </div>
        </div>
        <h3>ลองของ ซีรีส์ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (สยองขวัญ | ระทึกขวัญ )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 8 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        
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
</div>

</body>
</html>