function toggleFavorite(element, title) {
    element.classList.toggle('checked'); // Toggle 'checked' class

    const isFavorite = element.classList.contains('checked');
    
    // ส่งข้อมูลไปยัง PHP
    fetch('add_favorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title: title, favorite: isFavorite }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message); // รับข้อความตอบกลับจากเซิร์ฟเวอร์
    })
    .catch(error => {
        console.error('Error:', error);
    });
}