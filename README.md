# Update
//ใช้เพื่อเลือกไฟล์ที่จะเซฟ
git add . 

//ใช้แบบนี้ก็ได้
git add main.php 

//ที่อยู่ไฟล์
git remote add origin https://github.com/kaktarnzaza1234/Prime.git 

git commit -m "อธิบายว่าแก้ไรไปบ้าง"

//เลือกสาขาที่จะอัปโหลด main คือสาขาหลัก
git branch -M main 
git branch -M test1

//push คือ upload ข้อมูลไป github
git push -u origin main 
//หลังใช้โค้ด push แรกแล้ว เพราะ -u ทำให้โค้ดรู้อยู่แล้วว่าจะส่งไป main
git push 

# Prime
