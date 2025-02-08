// ดึงองค์ประกอบที่เกี่ยวข้องจาก DOM
const sortOptions = document.getElementById('sort-options');
const searchInput = document.getElementById('search-input');
const searchButton = document.getElementById('search-button');
const productList = document.querySelector('.product-list');

// ฟังก์ชันดึงข้อมูลสินค้า
function fetchProducts() {
    const filter = searchInput.value.trim();
    const sort = sortOptions.value;

    fetch(`fetch_products.php?filter=${encodeURIComponent(filter)}&sort=${encodeURIComponent(sort)}`)
        .then(response => response.json())
        .then(data => {
            console.log("Products fetched:", data); // Debugging log
            productList.innerHTML = ''; // ล้างสินค้าเดิม

            data.forEach(product => {
                if (!product.FilesID) {
                    console.error("Missing product ID:", product);
                    return;
                }

                const productCard = document.createElement('div');
                productCard.classList.add('product-card');

                // ใช้ encodeURIComponent กับ id ป้องกันปัญหา undefined
                productCard.innerHTML = `
                    <a href="product-detail.php?id=${encodeURIComponent(product.FilesID)}">
                        <img src="myfile/${encodeURIComponent(product.FilesName)}" alt="${product.Name}" class="product-image">
                        <h3>${product.Name}</h3>
                        <p>฿${product.Price}</p>
                    </a>
                `;

                productList.appendChild(productCard);
            });
        })
        .catch(error => console.error('Error fetching products:', error));
}

// โหลดสินค้าเมื่อเปิดหน้า
window.addEventListener('DOMContentLoaded', fetchProducts);

// กดปุ่มค้นหา
searchButton.addEventListener('click', fetchProducts);

// เปลี่ยนตัวเลือกเรียงลำดับ
sortOptions.addEventListener('change', fetchProducts);
