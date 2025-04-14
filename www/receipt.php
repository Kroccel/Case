<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Разделитель счёта - GigaChat Receipt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sber-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            height: 70px;
        }
        .sber-logo {
            height: 40px;
            width: auto;
        }
        .main-content {
            margin-top: 80px;
        }
        :root {
            --primary: #21A038;
            --primary-hover: #1C8A30;
            --primary-light: rgba(33, 160, 56, 0.1);
            --secondary: #0089FF;
            --text: #222222;
            --text-light: #666666;
            --bg: #F6F7F8;
            --card: #ffffff;
            --border: #E0E0E0;
            --success: #21A038;
            --error: #E52F2F;
            --warning: #FF9E1B;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: var(--bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: var(--text);
        }
        
        .container {
            width: 100%;
            max-width: 600px;
        }
        
        .upload-card {
            background-color: var(--card);
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
            position: relative;
        }
        
        h1 {
            color: var(--text);
            margin-bottom: 16px;
            font-size: 24px;
            font-weight: 600;
        }
        
        .description {
            color: var(--text-light);
            margin-bottom: 32px;
            font-size: 15px;
            line-height: 1.6;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        
        .upload-area {
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 24px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            border: none;
            text-align: center;
        }
        .upload-content {
            transition: transform 0.3s ease;
        }    
        .upload-area.active {
            border-color: var(--primary);
        }
        
        .upload-icon {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 12px;
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        .upload-area:hover .upload-icon {
            transform: translateY(-5px);
            color: var(--primary-hover);
        }
        
        .upload-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-bottom: 16px;
        }
        .main-text {
            font-size: 16px;
            font-weight: 500;
            color: var(--text);
        }

        .sub-text {
            font-size: 14px;
            color: var(--text-light);
        }

        
        .file-input {
            display: none;
        }
        
        .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(33, 160, 56, 0.2);
        }
        
        .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(33, 160, 56, 0.3);
        }
        
        .btn-outline {
            background-color: white;
            border: 1px solid var(--primary);
            color: var(--primary);
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.25s ease;
            margin-bottom: 16px;
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(33, 160, 56, 0.2);
        }
        
        .file-info {
            font-size: 12px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .file-info i {
            font-size: 14px;
            color: var(--primary);
        }
        .upload-area.drag-over {
            animation: pulse 1.5s infinite;
            border-color: var(--primary);
            background-color: var(--primary-light);
        }

        @keyframes pulse {
            0% { border-color: var(--primary); }
            50% { border-color: rgba(33, 160, 56, 0.3); }
            100% { border-color: var(--primary); }
        }
        
        .message {
            margin-top: 20px;
            padding: 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .success {
            background-color: rgba(33, 160, 56, 0.1);
            color: var(--success);
            border: 1px solid rgba(33, 160, 56, 0.3);
        }
        
        .error {
            background-color: rgba(229, 47, 47, 0.1);
            color: var(--error);
            border: 1px solid rgba(229, 47, 47, 0.3);
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }
        
        .feature {
            background: var(--primary-light);
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            max-width: 250px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .feature:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 12px;
        }
        
        .feature-title {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .feature-desc {
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.5;
        }
        
        #resultContainer {
            display: none;
            margin-top: 30px;
            text-align: left;
            background: var(--primary-light);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
        }
        
        #resultContainer h2 {
            color: var(--text);
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        #resultContent {
            font-size: 15px;
            line-height: 1.6;
        }
        
        #resultContent p {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed var(--border);
        }
        
        #resultContent p:last-child {
            border-bottom: none;
        }
        
        .loading {
            display: none;
            margin: 20px 0;
            text-align: center;
            color: var(--text-light);
        }
        
        .loading i {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }

        /* Модальные окна */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active .modal {
            transform: translateY(0);
        }
        
        .modal-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text);
        }
        
        .modal-content {
            margin-bottom: 25px;
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .input-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text);
        }
        
        .input-field {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .receipt-data {
            text-align: left;
            margin-bottom: 20px;
            max-height: 300px;
            overflow-y: auto;
            padding: 15px;
            background-color: var(--primary-light);
            border-radius: 8px;
        }
        
        .receipt-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }
        
        .receipt-total {
            font-weight: 600;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 2px solid var(--primary);
        }
        
        @media (max-width: 768px) {
            .upload-card {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 22px;
            }
            
            .description {
                max-width: 100%;
            }
            
            .features {
                flex-direction: column;
                align-items: center;
            }
            
            .feature {
                max-width: 100%;
            }

            .modal-actions {
                flex-direction: column;
            }
            
            .modal {
                padding: 20px;
            }
        }
        
    </style>
</head>
<body>
<header class="sber-header">
        <img src="Sberbank_Logo_2020.svg.png" alt="СберБанк" class="sber-logo">
    </header>
<div class="main-content">
    <div class="container">
        <form id="receiptForm" class="upload-card" enctype="multipart/form-data">
            <h1>Разделитель счёта для ресторана</h1>
            <p class="description">Просто загрузите фото чека, и мы автоматически разделим его между участниками</p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon"><i class="fas fa-receipt"></i></div>
                    <div class="feature-title">Распознаём любые чеки</div>
                    <div class="feature-desc">Работаем с бумажными и электронными чеками из любых ресторанов</div>
                </div>
                <div class="feature">
                    <div class="feature-icon"><i class="fas fa-users"></i></div>
                    <div class="feature-title">Делим на компанию</div>
                    <div class="feature-desc">Учитываем индивидуальные заказы каждого участника</div>
                </div>
                <div class="feature">
                    <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                    <div class="feature-title">Мгновенный расчёт</div>
                    <div class="feature-desc">Точный результат за несколько секунд без ошибок</div>
                </div>
            </div>
            
            <label for="receipt" class="upload-area" id="uploadLabel">
    <div class="upload-content">
        <div class="upload-icon">
            <i class="fas fa-cloud-upload-alt"></i>
        </div>
        <div class="upload-text">
            <span class="main-text">Перетащите сюда чек</span>
            <span class="sub-text">или</span>
        </div>
        <button type="button" class="btn btn-outline" id="selectFileBtn">
            <i class="fas fa-search"></i> Выбрать файл
        </button>
        <div class="file-info">
            <i class="fas fa-info-circle"></i> Поддерживаемые форматы: JPG, PNG, PDF до 5 МБ
        </div>
    </div>
    <input type="file" id="receipt" name="receipt" class="file-input" accept="image/*,.pdf" required>
</label>
            
            <div class="loading" id="loadingIndicator">
                <i class="fas fa-spinner fa-spin"></i>
                Идёт обработка чека...
            </div>
            
            <div id="resultContainer">
                <h2>Результат разделения счёта</h2>
                <div id="resultContent"></div>
            </div>
            
            <button type="submit" class="btn" id="submitBtn" style="display: block; width: 100%; max-width: 280px; margin: 0 auto;">
                <i class="fas fa-calculator"></i> Разделить счёт
            </button>
        </form>
    </div>

    <!-- Модальное окно для количества людей -->
    <div class="modal-overlay" id="peopleModal">
        <div class="modal">
            <h3 class="modal-title">На сколько человек делим счёт?</h3>
            <div class="modal-content">
                <div class="input-group">
                    <label for="modalPeopleCount" class="input-label">Количество людей:</label>
                    <input type="number" id="modalPeopleCount" class="input-field" min="2" max="10" value="2" required>
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn" id="confirmPeopleBtn">
                    <i class="fas fa-check"></i> Подтвердить
                </button>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно для выбора способа разделения -->
    <div class="modal-overlay" id="methodModal">
        <div class="modal">
            <h3 class="modal-title">Как будем делить счёт?</h3>
            <div class="modal-content">
                <p>Выберите способ разделения счёта:</p>
                <div class="receipt-data" id="receiptPreview"></div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-outline" id="byCountBtn">
                    <i class="fas fa-user-friends"></i> По количеству
                </button>
                <button type="button" class="btn btn-outline" id="byItemsBtn">
                    <i class="fas fa-list"></i> По позициям
                </button>
            </div>
        </div>
    </div>
    
    <!-- Модальное окно с результатом -->
    <div class="modal-overlay" id="resultModal">
        <div class="modal">
            <h3 class="modal-title">Результат разделения счёта</h3>
            <div class="modal-content">
                <div class="receipt-data">
                    <p id="resultText"></p>
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn" id="closeResultBtn">
                    <i class="fas fa-times"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>

    <script>
        document.getElementById('selectFileBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('receipt').click();
        });

        document.getElementById('receipt').addEventListener('change', function() {
            const uploadLabel = document.getElementById('uploadLabel');
            const uploadText = uploadLabel.querySelector('.upload-text .main-text');
            
            if (this.files && this.files[0]) {
                uploadLabel.classList.add('active');
                uploadText.textContent = this.files[0].name;
                document.getElementById('resultContainer').style.display = 'none';
            } else {
                uploadLabel.classList.remove('active');
                uploadText.textContent = 'Перетащите сюда чек';
            }
        });

        // Drag and drop
        const uploadLabel = document.getElementById('uploadLabel');

        uploadLabel.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadLabel.classList.add('drag-over');
        });

        uploadLabel.addEventListener('dragleave', () => {
            uploadLabel.classList.remove('drag-over');
        });

        uploadLabel.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadLabel.classList.remove('drag-over');
            document.getElementById('receipt').files = e.dataTransfer.files;
            const event = new Event('change');
            document.getElementById('receipt').dispatchEvent(event);
        });

        // Элементы модальных окон
        const peopleModal = document.getElementById('peopleModal');
        const methodModal = document.getElementById('methodModal');
        const resultModal = document.getElementById('resultModal');
        const modalPeopleCount = document.getElementById('modalPeopleCount');
        const confirmPeopleBtn = document.getElementById('confirmPeopleBtn');
        const byCountBtn = document.getElementById('byCountBtn');
        const byItemsBtn = document.getElementById('byItemsBtn');
        const resultText = document.getElementById('resultText');
        const closeResultBtn = document.getElementById('closeResultBtn');
        const receiptPreview = document.getElementById('receiptPreview');

        // Данные чека
        let receiptData = null;
        let peopleCount = 2;

        document.getElementById('receiptForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            const loadingIndicator = document.getElementById('loadingIndicator');
            
            try {
                if (!document.getElementById('receipt').files.length) {
                    throw new Error('Пожалуйста, выберите файл чека');
                }
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Обработка...';
                loadingIndicator.style.display = 'block';
                
                // Имитация обработки чека (в реальном приложении здесь будет вызов API)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Тестовые данные чека
                receiptData = {
                    items: [
                        { name: "Стейк Рибай", price: 1200, quantity: 2 },
        { name: "Салат Цезарь", price: 450, quantity: 1 },
        { name: "Картофель фри", price: 300, quantity: 3 },
        { name: "Кола 0.5л", price: 150, quantity: 4 },
        { name: "Морс 0.3л", price: 180, quantity: 2 },
        { name: "Чизкейк", price: 350, quantity: 1 }
                    ],
                    total: (1200*2) + (450*1) + (300*3) + (150*4) + (180*2) + (350*1),
                    date: new Date().toLocaleDateString(),
                    restaurant: "Ресторан 'Гриль Хаус'"
                };
                
                // Показываем превью данных чека
                showReceiptPreview(receiptData);
                
                // Показываем модальное окно для выбора количества людей
                peopleModal.classList.add('active');
                
            } catch (error) {
                showMessage(error.message, 'error');
                console.error('Ошибка:', error);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                loadingIndicator.style.display = 'none';
            }
        });

        // Подтверждение количества людей
        confirmPeopleBtn.addEventListener('click', () => {
            peopleCount = parseInt(modalPeopleCount.value);
            if (peopleCount < 2 || peopleCount > 20) {
                showMessage('Введите число от 2 до 20', 'error');
                return;
            }
            
            peopleModal.classList.remove('active');
            methodModal.classList.add('active');
        });

        // Выбор способа "По количеству"
        byCountBtn.addEventListener('click', () => {
            methodModal.classList.remove('active');
            const amountPerPerson = (receiptData.total / peopleCount).toFixed(2);
            resultText.innerHTML = `Общая сумма: <strong>${receiptData.total} ₽</strong><br>
                                  Разделено на <strong>${peopleCount}</strong> человек<br><br>
                                  <strong>Каждый должен:</strong> ${amountPerPerson} ₽`;
            resultModal.classList.add('active');
        });

        // Выбор способа "По позициям" (заглушка)
        byItemsBtn.addEventListener('click', () => {
    methodModal.classList.remove('active');
    
    // Проверяем, есть ли данные чека
    if (!receiptData) {
        showMessage('Ошибка: данные чека не загружены', 'error');
        return;
    }
    
    // Сохраняем данные в localStorage для передачи на новую страницу
    localStorage.setItem('receiptData', JSON.stringify(receiptData));
    localStorage.setItem('peopleCount', peopleCount);
    
    // Переходим на новую страницу
    window.location.href = 'split-by-items.html';
});

        // Закрытие результата
        closeResultBtn.addEventListener('click', () => {
            resultModal.classList.remove('active');
        });

        // Показать превью данных чека
        function showReceiptPreview(data) {
            let html = `
                <h4>${data.restaurant}</h4>
                <p><small>${data.date}</small></p>
                <div style="margin-top: 15px;">
            `;
            
            data.items.forEach(item => {
                html += `
                    <div class="receipt-item">
                        <span>${item.name}</span>
                        <span>${item.price}₽, ${item.quantity}шт</span>
                    </div>
                `;
            });
            
            html += `
                </div>
                <div class="receipt-total">
                    <span>Итого:</span>
                    <span>${data.total} ₽</span>
                </div>
            `;
            
            receiptPreview.innerHTML = html;
        }

        function showMessage(text, type) {
            const existingMessages = document.querySelectorAll('.message');
            existingMessages.forEach(msg => msg.remove());
            
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            messageDiv.innerHTML = `<i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'check-circle'}"></i> ${text}`;
            
            const container = document.querySelector('.upload-card');
            container.insertBefore(messageDiv, document.getElementById('submitBtn'));
            
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }
    </script>
</body>
</html>