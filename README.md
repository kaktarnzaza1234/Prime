## Download file
เปิด cmd  
git clone https://github.com/kaktarnzaza1234/Prime.git  

## เลือกที่ๆจะโหลดไฟล์
cd D:\xampp\htdocs  

# Update

## เริ่มต้น Git repository ในเครื่อง
git init

## ที่อยู่ไฟล์
git remote add origin https://github.com/kaktarnzaza1234/Prime.git 

## 1.ใช้เพื่อเลือกไฟล์ที่จะเซฟ
git add .  
git add main.php 
## 2.บันทึกว่าแก้ไรพร้อมเขียนอธิบาย
git commit -m "#"  
git commit -m "อธิบายว่าแก้ไรไปบ้าง"

## 3.เลือกสาขาที่จะอัปโหลด main คือสาขาหลัก (ถ้าจำเป็น)
git branch -M main  
git branch -M test1

## 4.push คือ upload ข้อมูลไป github
git push -u origin main
## 4.หลังใช้โค้ด push แรกแล้ว เพราะ -u ทำให้โค้ดรู้อยู่แล้วว่าจะส่งไป main
git push 

# Prime
