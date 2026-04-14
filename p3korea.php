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
  
.heading {
    position: relative;
    overflow: hidden;
}

.heading::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(120deg, rgba(255,255,255,0), rgba(255,255,255,0.5), rgba(255,255,255,0));
    transition: transform 0.5s ease;
    transform: translateX(-100%);
}

.heading.show-effect::before {
    transform: translateX(100%);
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
  <img class="w3-image" src="img/ปกเกาหลี.jpg" alt="Architecture" width="1500" height="800">
  <div class="overlay">หนังยอดฮิตประจำเดือน</div>
  <div class="w3-display-middle w3-margin-top w3-center">
</header>


<br><h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">โรแมนติก</h3>

<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k1.jpg" alt="John" class="image">
            <div class="overlay">ซีรีส์รีเมคผลงานโรแมนติกจากซีรีส์เรื่องดังของไต้หวัน Someday or One Day บอกเล่าเรื่องราว รักโรแมนติกข้ามเวลา ของ จุนฮี ที่คิดถึงแฟนหนุ่มที่เสียชีวิตไปเมื่อปีก่อน และได้ย้อนเวลากลับไปยังปี 1998 ซึ่งเธอได้พบกับ ชีฮอน ชายที่หน้าตาเหมือนกับแฟนที่จากไปทุกประการ</div>
        </div>
        <h3> A Time Called You<span class="fa fa-heart favorite" onclick="toggleFavorite(this, 'A Time Called You', 'img/k1.jpg')"></span> </h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (แฟนตาซี | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k2.jpg" alt="Jane" class="image">
            <div class="overlay">ซีรีส์สร้างจากเว็บตูนในชื่อเดียวกัน บอกเล่าเรื่องราวความรักสุดวุ่นวาย ของ ฮันแฮนา หญิงสาวผู้ต้องการถอนคำสาปจากการกลายร่างเป็นสุนัขเมื่อตะวันลับฟ้า อันเป็นคำสาปประจำตระกูลที่สืบทอดจากรุ่นสู่รุ่น ซึ่งจะเกิดขึ้นเมื่อไหร่ก็ตามที่เธอจูบกับใคร กับ จินซอวอน ชายหนุ่มผู้กลัวสุนัขขึ้นสมองเพราะเหตุการณ์เลวร้ายในอดีตที่ฝังใจ</div>
        </div>
        <h3>จูบรักปลดล็อก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก | คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 14 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k3.jpg" alt="Mike" class="image">
            <div class="overlay"> เป็นซีรีส์แนวโรแมนติกแฟนตาซี ที่พล็อตเรื่องค่อยข้างน่าสนใจ เปิดเรื่องมาคือดีเลย เสียดายแผ่วปลาย ชอบดูพาร์ทอดีต ทำออกมาได้ดี น่าติดตาม พระนางเคมีดี โรอุนเรื่องนี้หล่อมากกก หล่อสุดๆ หน้าเอยหุ่นเอย ยิ่งเจอฉากเลิฟซีนเข้าไปอีก ฟินนน นางเอกก็น่ารักนะ แต่ติดช่วงท้ายๆบทคือไม่ไหว แต่ให้อภัยเพราะพระนางน่ารัก </div>
        </div>
        <h3>Destined With You<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี  (โรแมนติก | แฟนตาซี)</p>
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
            <img src="img/k4.jpg" alt="Dan" class="image">
            <div class="overlay">ซีรีส์ที่ว่าด้วยเรื่องราวเกี่ยวกับ กูวอน ทายาทตระกูลแชโบลที่ไม่สามารถทนกับรอยยิ้มอันจอมปลอมได้ จนเขาได้มาพบกับ ชอนซารัง ผู้ซึ่งมาพร้อมกับรอยยิ้มอันสดใสเสมอแม้ในเวลาที่เธอไม่ต้องการ เนื่องจากลักษณะงานของเธอที่ต้องยิ้มแย้มสดใสอยู่เสมอ ทั้งคู่ต่างตามหาวันที่มีความสุขที่ทำให้พวกเขาสามารถยิ้มออกมาจากใจได้อย่างแท้จริง…
            </div>
        </div>
        <h3>King the Land<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก | ดราม่า)</p>
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
            <img src="img/k5.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นซีรีส์แนวการแพทย์อีกเรื่องที่ดีมากกก สนุกกก สนุกทุกซีซั่น ไม่ผิดหวังที่รอคอย ประทับใจมาก epแรกเปิดมาก็เข้มข้นและตื่นเต้นเลย มีเรื่องราว มีเคสอุบัติเหตุที่ต้องผ่าตัดใหญ่ๆให้ลุ้นทุกตอน และซีซั่นนี้ก็ขนนักแสดงกลุ่มโรงพยาบาลทลดัมจากซีซั่น2 มาครบทุกคนเลย ดูแล้วก็ยังรู้สึกอินและผูกพันธ์กับทุกตัวละครอยู่ มันดีจริงๆ ดูเถอะ</div>
        </div>
        <h3>Dr.Romantic 3 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (การแพทย์| โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k6.jpg" alt="John" class="image">
            <div class="overlay">หลังจากที่นักซูในร่างของมูด็อก ถูกควบคุมด้วยเสียงกระดิ่งให้ล้างแค้นให้พ่อของเธอจนเป็นเหตุให้จางอุก ด้วยความเสียใจมูด็อกกระโดดหน้าผาจบชีวิตร่างแปรวิญญาณของตัวเอง ระหว่างไล่ล่าผู้แปรวิญญาณจางอุกได้พบเจอกับจินบูยอน  ลูกสาวคนโตแห่งตระกูลจิน หญิงสาวที่มีพลังเวทมนตร์แข็งแกร่ง เธอฟื้นคืนชีพหลังจากครอบครัวกู้ร่างคืนมาจากทะเล จากนั้นถูกคุมขังในห้องลับของบ้านตระกูลจิน และถูกบังคับให้แต่งงานเพื่อสืบสกุล </div>
        </div>
        <h3>Alchemy of Souls2 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก | แฟนตาซี)</p>
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
            <img src="img/k7.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นเรื่องราวของความโรแมนติก ความเสียสละ ความรักชาติ ของพระเอกหนุ่มซึ่งเป็นทหารและนางเอกที่เป็นแพทย์หญิง ทั้งคู่มีโอกาศไปทำงานที่ยากลำบากเสี่ยงตายด้วยกัน ผ่านบททดสอบมากมายจนกลายเป็นความรักในที่สุด</div>
        </div>
        <h3>ชีวิตเพื่อชาติรักนี้เพื่อเธอ <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก)</p>
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
            <img src="img/k8.jpg" alt="Mike" class="image">
            <div class="overlay">เนื้อหาในละครกล่าวถึง "ลี ยองจุน" รองประธานกลุ่มบริษัทยักษ์ใหญ่วัย ที่ทั้งฉลาด รูปหล่อ หุ่นดี ร่ำรวย แต่หลงตัวเองสุดๆ จนละเลยความรู้สึกคนอื่น ซ้ำยังไม่สนใจในสิ่งที่เลขาของเขาพยายามบอกมาโดยตลอด ไม่เคยมีความสัมพันธ์ฉันท์ชู้สาวกับหญิงคนไหน และไม่ยอมให้ผู้หญิงเข้าใกล้ ยกเว้น "คิม มีโซ" สุดยอดเลขานุการ ซึ่งอุทิศตนทำงานอย่างหนักให้เขามาตลอด เธอเป็นเลขามากฝีมือที่ขยัน อึด อดทน แต่แล้วอยู่ๆ เธอก็ประกาศว่าจะลาออกทำให้ยองจุนถึงกับช็อค เขาจึงสงสัยว่าเกิดอะไรขึ้นกับเลขาคิมกันแน่ และพยายามทำทุกวิถีทางเพื่อรั้งเธอไว้ </div>
        </div>
        <h3>เลขาคิม<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก | คอมเมดี้ )</p>
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
            <img src="img/k9.jpg" alt="Dan" class="image">
            <div class="overlay"> คิมมินคยู (รับบทโดย ยูซึงโฮ) ชายหนุ่มที่ถือหุ้นใหญ่ในบริษัทการเงินที่ใหญ่ที่สุดในประเทศ และไอคิวสูงมาก เป็นโรคแพ้การสัมผัสผู้คนทำให้ไม่เคยมีความสัมพันธ์หรือความรักมาก่อนเลย ไปตกหลุมรักกับ โจจีอา (รับบทโดย แชซูบิน) หญิงสาวที่ต้องแกล้งทำตัวเป็นหุ่นยนต์เสมือนมนุษย์เพราะความจำเป็น </div>
        </div>
        <h3>I'm Not a Robot <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix</p>
        <p class="w3-opacity">จำนวนตอน  : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k10.jpg" alt="Mike" class="image">
            <div class="overlay">ซีรีส์แนวแฟนตาซี-เรโทร ว่าด้วยเรื่องราวของนักเรียนชายที่เกิดจากพ่อแม่ซึ่งบกพร่องทางการได้ยินแต่มีพรสวรรค์ทางด้านดนตรี วันหนึ่งเขาได้ย้อนเวลาไปเจอพ่อตนเองในวัยไล่เลี่ยกันซึ่งพ่อของเขาในตอนนั้นก็เป็นทั้งนักเรียนและนักดนตรีจนทั้งคู่ได้สร้างมิตรภาพร่วมกัน </div>
        </div>
        <h3>ย้อนวัยใจสู่ฝัน <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า | โรแมนติก)</p>
        <p class="w3-opacity">ช่องทางการรับชม : viu </p>
        <p class="w3-opacity">จำนวนตอน  : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
    </div>


    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">ดราม่า</h3>
    
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k11.jpg" alt="John" class="image">
            <div class="overlay">ซีรีส์จะเล่าเรื่องราวเกี่ยวกับชีวิตของ มุนดงอึน (รับบทโดย ซงฮเยคโย) หญิงสาวคนหนึ่งที่ใฝ่ฝันอยากเป็นสถาปนิก แต่เธอต้องลาออกจากโรงเรียน หลังถูกรังแกและทำร้ายร่างกายอย่างรุนแรงสมัยมัธยมปลาย เธอจึงเฝ้ารอให้คู่กรณีเติบโตขึ้นจนแต่งงานและมีลูก เมื่อลูกของคู่กรณีโตพอที่จะเข้าโรงเรียนประถม เธอก็ได้เข้ามาเป็นคุณครูประจำชั้นของเด็กคนนั้น และเริ่มต้นการแก้แค้น…</div>
        </div>
        <h3>The Glory <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า)</p>
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
            <img src="img/k12.jpg" alt="Jane" class="image">
            <div class="overlay">เป็นซีรีส์แนวแฟนตาซี-โรแมนติกที่เล่าถึง อียอน ได้ย้อนกลับไปในปี 1938 และได้พบกับผู้คนที่คุ้นเคย อย่างเช่น อีรัง น้องชายของเขา ที่มีความสัมพันธ์แตกต่างจากในยุคปัจจุบันมาก อียอนพยายามหาทางกลับไปสู่ช่วงเวลาปัจจุบัน แต่ระหว่างนั้นเขาก็ได้พบกับเพื่อนเก่าที่ได้แปรเปลี่ยนไปเป็นศัตรู นอกจากจะมีอุปสรรคมากมายที่ขัดขวางไม่ให้เขากลับไปหาคนรักในยุคปัจจุบันแล้ว อียอนยังต้องเผชิญกับบางสิ่งที่มุ่งมั่นจะพรากทุกคนที่เขารักให้จากไป…</div>
        </div>
        <h3>Tale of the Nine Tailed<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า | แฟนตาซี)</p>
        <p class="w3-opacity">ช่องทางการรับชม : tvN </p>
        <p class="w3-opacity">จำนวนตอน : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k13.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวของแม่เลี้ยงเดี่ยว ยองซุน (รับบทโดย รามีรัน) ที่เลี้ยงดู คังโฮ (รับบทโดย อีโดฮยอน) ลูกชายของเธอด้วยตัวคนเดียว เธอกลายเป็น “แม่ใจร้าย” และเข้มงวดกับลูกชายเพราะไม่อยากให้เขาต้องโตไปเป็นคนยากจนหรือไร้อำนาจ ความมีระเบียบวินัยของเธอทำให้คังโฮโตมาเป็นอัยการที่มีหน้ามีตา แต่แล้วคังโฮกลับต้องสูญเสียความทรงจำเนื่องจากอุบัติเหตุร้าย และกลับไปเป็นเด็กวัย 7 ขวบอีกครั้ง ยองซุนจึงตัดสินใจที่จะกลายเป็น “แม่ใจร้าย” เพื่อให้คังโฮได้เติบโตอีกครั้ง
            </div>
        </div>
        <h3>Good Bad Mother<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า)</p>
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
            <img src="img/k14.jpg" alt="Dan" class="image">
            <div class="overlay">ซีรีส์แนวคอมเมดี้-ดราม่า ที่เล่าถึงภรรยาซึ่งเป็นแม่บ้านมา 20 ปี เธออุทิศทั้งชีวิตเพื่อดูแลครอบครัว ก่อนที่เธอจะมาทำหน้าที่ตรงนี้ เธอเรียนจบแพทย์มาก่อน แล้วเธอก็ตัดสินใจเดินออกจากเส้นทางสายอาชีพนี้ไปเพื่อดูแลครอบครัว แต่แล้ววันหนึ่งหลังเธอก็ตัดสินใจกลับไปทำงานในสายการแพทย์นี้อีกครั้ง และจะเล่าถึงสามีของเธอที่เป็นคนที่สามารถสร้างสมดุลย์ทั้งชีวิตการงานและชีวิตส่วนตัวได้เป็นอย่างดี และยังเป็นคนที่ทำงานเก่งรวมถึงนอกใจภรรยาก็เก่งด้วยเช่นกัน</div>
        </div>
        <h3>Doctor Cha<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า | การแพทย์)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k15.jpg" alt="Mike" class="image">
            <div class="overlay">ภาพยนตร์ที่จะพาทุกคนย้อนกลับไปในปี พ.ศ. 2542 พร้อมเติบโตและเรียนรู้เรื่องราวความรักไปกับ “ต๋อง” เด็กผู้ชายในวัย 16 หัวโจกของแก๊งสุดห่ามประจําโรงเรียน และแก๊งเพื่อนอย่าง “โด่ง”, “แบงค์”, ไม้ และ “เปา” ที่มักจะก่อวีรกรรมสุดป่วนสร้างความปวดหัวให้กับเหล่าครูในโรงเรียนอยู่เสมอ แต่แล้ววันหนึ่ง “ต๋อง” และเพื่อนๆ เกิดนึกสนุกเล่นพิเรนทร์กลางห้องเรียน จนทําให้ “ต๋อง” ถูกทําโทษด้วยการย้ายมานั่งอยู่หน้า “หลิน” นักเรียนดีเด่นประจําโรงเรียนที่ทั้งน่ารักและเรียนเก่ง </div>
        </div>
        <h3>Moon lovers<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (โรแมนติก | ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : viu </p>
        <p class="w3-opacity">จำนวนตอน : 20 </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k16.jpg" alt="John" class="image">
            <div class="overlay">ซีรีส์ที่อ้างอิงมาจากนิยายออนไลน์ในชื่อเดียวกัน เล่าเรื่องราวเกี่ยวกับ ยุนฮยอนอู (รับบทโดย ซงจุงกิ) ที่ทำงานรับใช้ตระกูลแชบอลอย่างจงรักภักดีมานานกว่า 10 ปี แต่เขากลับถูกฆ่าอย่างไม่ใยดี และกลับมามีชีวิตใหม่อีกครั้งในร่างของหลานชายคนเล็กสุดของตระกูลแชบอลที่ทรยศเขา แผนล้างแค้นและตามหาคนที่สั่งฆ่าเขาจึงเริ่มต้นขึ้น</div>
        </div>
        <h3>Reborn Rich<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ดราม่า | แฟนตาซี)</p>
        <p class="w3-opacity">ช่องทางการรับชม : viu </p>
        <p class="w3-opacity">จำนวนตอน : 20 </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k17.jpg" alt="Jane" class="image">
            <div class="overlay">สร้างอ้างอิงจากเรื่องจริงในปี 1971 เครื่องบินเกาหลีใต้ถูกไฮแจ็ค (แต่คิดว่าในหนังคงใส่ความดราม่าไปเยอะ) ผู้ร้ายต้องการให้เครื่องบินจากเกาหลีใต้ไปยังสถานที่แห่งหนึ่ง</div>
        </div>
        <h3>Hijack 1971 <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลีเกาหลี (ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 101 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k18.jpg" alt="Mike" class="image">
            <div class="overlay">แม่ที่เสียชีวิตไปอย่างปัจจุบันทันด่วน เมื่อเธออยู่ในโลกหลังความตาย สวรรค์เบื้องบนได้มอบรางวัล ‘วันหยุดพิเศษ’ สามารถกลับมาเยี่ยมคนที่รักบนโลกได้ เพื่อเก็บเกี่ยวความทรงจำดีๆเป็นครั้งสุดท้าย บังเอิญภรรยาของผู้ชนะอันดับสามเกิดเสียชีวิตเสียก่อนไปพบ สิทธิ์เลยตกมาที่พัคบกจาซึ่งได้อันดับ 4 อย่างโชคดี เธอจึงขอใช้ ‘สามวันลา’นี้ มาหาลูกสาวคนเดียวของเธอ คือ พังจินจู โดยมีเจ้าหน้าที่ฑูตสวรรค์ เป็นไกด์นำทางกลับลงมาสู่โลก และเป็นพี่เลี้ยงคอยคุมชี้นำการปฏิบัติตัวอย่างเคร่งครัด</div>
        </div>
        <h3>Our Season<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ดราม่า | แฟนตาซี)</p>
        <p class="w3-opacity">ช่องทางการรับชม : TrueID</p>
        <p class="w3-opacity">ความยาว : 105 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k19.jpg" alt="Dan" class="image">
            <div class="overlay">รื่องราวความรักที่ซ่อนงำความลับของนักเขียนมือรางวัล “จุนซอก” และอาจารย์ศิลปะ “ด็อกฮี“ ที่ใช้ชีวิตคู่อย่างแสนสุขสันต์ แต่แล้วชีวิตรักของพวกเขาและเธอกลับต้องเจอมรสุมลูกใหญ่ เมื่อด็อกฮีมีอาการสูญเสียความทรงจำบางส่วน และวันหนึ่งจุนซอกออกเดินทางเพื่อหาแรงบันดาลใจในการเขียนผลงานเรื่องใหม่แต่กลับเกิดอุบัติเหตุถึงชีวิต ด็อกฮีทำใจด้วยการเดินทางตามรอยสามีผู้ล่วงลับจนเธอค้นพบความจริงชวนช็อกอย่างไม่ทันตั้งตัว</div>
        </div>
        <h3>เธอหลับเขาร้าย<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ดราม่า)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 105 นาที</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k20.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวของ ยุนฮงแดนักฟุตบอลตกอับที่ถูกระงับความฝันไว้ชั่วคราวเนื่องจากเหตุทำร้ายร่างกายที่ทำให้ชีวิตของเขาจำเป็นต้องไปต่อกับเส้นทางที่ไม่คาดฝันอย่างการเป็นโค้ชให้ทีมนักกีฬาฟุตบอลไร้บ้านเพื่อลงแข่งขันใน Homeless World Cup ในฐานะตัวแทนประเทศครั้งแรก ซึ่งเส้นทางนี้ได้ อีโซมิน  โปรดิวเซอร์สาวผู้เป็นคู่กัดกับยุนฮงแดมาร่วมถ่ายทำสารคดี ‘ความฝัน’ เรื่องนี้ด้วยกัน</div>
        </div>
        <h3>Dream<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ดราม่า | คอมเมดี้)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 125 นาที</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>


    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 heading">ระทึกขวัญ</h3>

    
<div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k21.jpg" alt="John" class="image">
            <div class="overlay">ซีรีส์แนวอาชญากรรม-แอ็กชั่น ที่เรื่องราวจะติดตามการทำงานของนายตำรวจหนุ่ม พัคจุนโม ที่ต้องแทรกซึมตัวเองเข้าไปในแก๊งมาเฟียย่านคังนัม เพื่อที่จะสืบคดีค้ายาข้ามชาติ ซึ่งมีเครือข่ายครอบคลุมทั้งในเกาหลี จีน และญี่ปุ่น ในช่วงปี 1995
            </div>
        </div>
        <h3>The Worst of Evil <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ระทึกขวัญ | อาชญากรรม)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Disney+ </p>
        <p class="w3-opacity">จำนวนตอน : 12 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k22.jpg" alt="Jane" class="image">
            <div class="overlay"> ก่อนการเผชิญหายนะจากฝูงซอมบี้คืนชีพ อาณาจักรโชซอนมีปมปัญหาขัดแย้งกับแว่นแคว้นโดยรอบอยู่หลายชนเผ่า หนึ่งในพื้นที่พิพาทจนสร้างความตึงเครียดก็คือดินแดนทางตอนเหนือ ที่ชาวหนี่ว์เจิน (女真 บรรพบุรุษของชาวแมนจู) รวมตัวกันตั้งตนเป็นกลุ่มชนเผ่าพาจอวี อันแข็งแกร่ง ยิ่งใหญ่และน่าเกรงขาม</div>
        </div>
        <h3>Kingdom<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (สยองขวัญ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 12 ตอน</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k23.jpg" alt="Mike" class="image">
            <div class="overlay">เรื่องราวเกี่ยวกับ คิมโมมี ที่ตอนกลางวันเป็นพนักงานออฟฟิศธรรมดาที่ไม่มั่นใจในรูปลักษณ์ของตัวเอง ส่วนตอนกลางคืนเป็นไลฟ์สตรีมเมอร์ที่ปกปิดใบหน้าไว้ใต้หน้ากากสีทอง และเธอก็ได้เข้าไปพัวพันกับเหตุการณ์ที่ไม่คาดฝัน รวมถึงพบเจอเรื่องราวพลิกผันมากมาย ซีรีส์เรื่องนี้สร้างจากเว็บตูนชื่อเดียวกันซึ่งเป็นทื่ชื่นชอบของผู้อ่านจำนวนมาก</div>
        </div>
        <h3>Mask Girl<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ระทึกขวัญ | ตลกร้าย)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 7 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k24.jpg" alt="Dan" class="image">
            <div class="overlay">นักฆ่าที่ปกปิดตัวตนเขาอาศัยอยู่ในหมู่บ้านชนบทแห่งหนึ่งกับลูกชาย​ เขาต้องอยู่อย่างหลบๆซ่อนๆเพราะลูกชายคือสิ่งเดียวที่มีค่าสำหรับเขา แต่แล้ววันหนึ่งเขาก็พบว่ามีเด็กสาวคนหนึ่งซึ่งเธอเป็นเพื่อนกับลูกชาย ได้รู้ถึงตัวตนที่แท้จริงของเขา! และเพื่อปกปิดความลับตัวตนของเขา​ สัญชาตญาณความเป็นนักฆ่าของเขาก็สั่งให้ต้องตัดสินใจทำอะไรบางอย่าง</div>
        </div>
        <h3>Murderer<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ระทึกขวัญ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 75 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k25.jpg" alt="Mike" class="image">
            <div class="overlay">เป็นเรื่องราว​เมื่อเจ้าหน้าที่คุมประพฤติ ทาบทามพลเรือนที่เก่งกาจด้านศิลปะการต่อสู้​ มาทำงานปราบปราม​อาชญากรรม ในตำแหน่งเจ้าหน้าที่นักสู้​</div>
        </div>
        <h3>Officer Black Belt <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ระทึกขวัญ | ​แอคชั่น )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 109 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-row-padding">
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k26.jpg" alt="John" class="image">
            <div class="overlay">พ่อลูกกำลังขึ้นรถไฟเคทีเอ็กซ์ที่จะพาทั้งสองเดินจากจากกรุงโซลไปยังเมืองปูซานเพื่อเยี่ยมภรรยาเก่าที่ไม่ได้พบกันมานาน แต่เมื่อรถไฟกำลังจะเคลื่อนออกจากชานชาลา สถานีรถไฟกลับถูกฝูงซอมบี้โจมตี</div>
        </div>
        <h3>ด่วนนรก ซอมบี้คลั่ง<span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (สยองขวัญ | แอคชั่น)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 115 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k27.jpg" alt="Jane" class="image">
            <div class="overlay">เล่าเรื่องราวของครอบครัวตระกูลคิม อาศัยอยู่ใต้ถุนของตึกซอมซ่อ วันหนึ่งเพื่อน คิมกีวู จะไปเรียนที่ต่างประเทศจึงขอให้เขาไปติวอังกฤษแทน คิมกีวู จึงแอบสวมรอยเป็นติวเตอร์ให้บ้านมหาเศรษฐีตระกูลปาร์ค จากนั้นเขาเห็นว่างานนี้สามารถสร้างเงินให้กับเขาได้อย่างสบาย เพื่ออยากให้ครอบครัวออกมาจากชีวิตที่เส็งเครง เขาจึงได้วางแผนการ เริ่มจากให้น้องสาว สวมบทบาทเป็นครูสอนศิลปะให้กับลูกชายคนเล็กของบ้านปาร์ค และให้พ่อ คิมกีแท็กมาเป็นคนขับรถให้กับคุณชายตระกูลปาร์ค </div>
        </div>
        <h3>ชนชั้นปรสิต <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (ระทึกขวัญ | คอมเมดี้ )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 132 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k28.jpg" alt="Mike" class="image">
            <div class="overlay">รื่องราวว่าด้วยสี่ผู้เชี่ยวชาญในแขนงอาชีพที่เกี่ยวข้องกับไสยศาสตร์สิ่งลี้ลับ ได้ร่วมมือกันรับงานใหญ่ชิ้นหนึ่งเป็นการขุดศพบรรพบุรุษของครอบครัวมหาเศรษฐีขึ้นมาหวังแก้อาถรรพ์ตกทอดของตระกูล การขุดศพตามชื่อเรื่อง Exhuma ที่ปกติเป็นงานไม่ยากนัก แต่กลับเผชิญกับเรื่องเกินคาด พัวพันต่อเนื่องให้ต้องช่วยกันสืบสาวขุดหาต้นตอที่สุดแสนอันตรายโหดร้าย</div>
        </div>
        <h3>ขุดมันขึ้นมาจากหลุม <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังไทย (ระทึกขวัญ)</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 122 นาที </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k29.jpg" alt="Dan" class="image">
            <div class="overlay">ซีรีส์ที่มีจุดมุ่งหมายที่จะส่งสารเกี่ยวกับความยุติธรรมผ่านการเปลี่ยนศาลให้กลายเป็นรายการสดห้องพิจารณาคดี ที่คนทั้งประเทศสามารถเข้ามามีส่วนร่วมในการช่วยตัดสินว่าจำเลยผิดหรือไม่ผิดกันแน่ ซึ่งตัวละคร คังโยฮัน ผู้ได้ชื่อว่า ‘ผู้พิพากษาปีศาจ’ ที่ปรากฏตัวท่ามกลางความสับสนวุ่นวาย เขาเป็นวีรบุรุษของผู้คน หรือเป็นปีศาจที่สวมหน้ากากแห่งกฎหมายกันแน่</div>
        </div>
        <h3>The Devil Judge <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">ซีรีส์เกาหลี (ระทึกขวัญ | ดราม่า )</p>
        <p class="w3-opacity">ช่องทางการรับชม : GMM25 / Netflix </p>
        <p class="w3-opacity">จำนวนตอน : 16 ตอน </p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    </div>
    <div class="w3-col l2 m5 w3-margin-bottom">
        <div class="container">
            <img src="img/k30.jpg" alt="Mike" class="image">
            <div class="overlay">เด็กหนุ่มลูกครึ่งเกาหลี-ฟิลิปปินส์ ที่ได้เติบโตในฟิลิปปินส์กับแม่ของเขา หลังจากที่พ่อได้ทอดทิ้งเขา และแม่เอาไว้ ชีวิตของเขาเติบโตมาอย่างยากลำบาก ต้องทำทุกอย่างเพื่อหาเลี้ยงตนเอง และแม่ที่ป่วย กระทั่งเขาที่ตามหาพ่อมานานหลายปี ในที่สุดก็จบสิ้นการรอคอย พ่อของเขาได้ตามหาเขาจนเจอ และได้ดำเนินเรื่องพาเขากลับเกาหลีในทันที แต่เขาไม่รู้เลยว่าการเดินทางในครั้งนี้ จะเป็นการเดินทางที่สุดแสนอันตรายที่มีชีวิตของตนเองเป็นเดิมพัน</div>
        </div>
        <h3>เทพบุตรล่านรก <span class="fa fa-heart favorite" onclick="toggleFavorite(this)"></span></h3>
        <p class="w3-opacity">หนังเกาหลี (คอมเมดี้| ระทึกขวัญ )</p>
        <p class="w3-opacity">ช่องทางการรับชม : Netflix </p>
        <p class="w3-opacity">ความยาว : 117 นาที </p>
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