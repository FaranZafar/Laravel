<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree Manager Pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .card { 
            cursor: pointer; 
            transition: all 0.3s ease; 
            border: none; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }
        .card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 8px 15px rgba(0,0,0,0.15); 
        }
        .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 2.5rem 1rem;
            text-align: center;
        }
        .card-header h2 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0;
            color: #333;
        }
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.8rem;
            opacity: 0.4;
            z-index: 10;
        }
        .delete-btn:hover { opacity: 1; }
    </style>
</head>
<body>
    
   <div class="jumbotron bg-white shadow-sm">
    <div class="container">
          <h1 class="mb-4 text-center font-weight-bold">Offered Programs</h1>
          <div class="row" id="degreeRow">
              </div>
          <div class="text-center">
            <button class="btn btn-dark px-5 py-2 mt-4 shadow-sm" id="addDegreeBtn">+ Add New Degree</button>
          </div>
    </div>
   </div>

    <script>
        // --- 1. CONFIGURATION & LOADING ---
        const degreeRow = document.getElementById('degreeRow');
        
        // Load existing degrees from LocalStorage or use a default one if empty
        let savedDegrees = JSON.parse(localStorage.getItem('myDegrees')) || ['Software Engineering'];

        // Initial render on page load
        window.onload = renderDegrees;

        function renderDegrees() {
            degreeRow.innerHTML = ''; // Clear current row
            savedDegrees.forEach((degree, index) => {
                createCardUI(degree, index);
            });
        }

        // --- 2. CORE FUNCTIONS ---

        function navigateToDegree(name) {
            window.location.href = `viewsem.php?name=${encodeURIComponent(name)}`;
        }

        function deleteDegree(index, event) {
            event.stopPropagation(); 
            if(confirm("Remove this program?")) {
                savedDegrees.splice(index, 1); // Remove from array
                updateStorage(); // Save to LocalStorage
                renderDegrees(); // Refresh UI
            }
        }

        function updateStorage() {
            localStorage.setItem('myDegrees', JSON.stringify(savedDegrees));
        }

        // --- 3. UI GENERATION ---

        function createCardUI(name, index) {
            const html = `
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100" onclick="navigateToDegree('${name}')">
                        <button class="btn btn-sm btn-outline-danger delete-btn" onclick="deleteDegree(${index}, event)">×</button>
                        <div class="card-header">
                            <h2>${name}</h2>
                        </div>
                    </div>
                </div>
            `;
            degreeRow.insertAdjacentHTML('beforeend', html);
        }

        // --- 4. EVENT LISTENERS ---

        document.getElementById('addDegreeBtn').addEventListener('click', function() {
            const degreeName = prompt("Enter the name of the degree:");
            if (degreeName && degreeName.trim() !== "") {
                savedDegrees.push(degreeName.trim());
                updateStorage();
                renderDegrees();
            }
        });
    </script>
</body>
</html>