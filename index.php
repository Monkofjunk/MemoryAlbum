<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Memory Album</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="Image/MascotLogo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                margin: 0;
                padding: 0;
                background-image: url('Images/BackgroundGif.gif');
                background-size: cover;
            }

            .navbar {
                background-image: url('Images/WebsiteHeader1.png');
                background-size: cover;
                height: 14vh;
            }

            .btn.btn-light {
                border: none;
                background-color: royalblue;
                color: white;
                height: 100%;
                width: 150%;
                border-radius: 20px;
            }

            .navbar-nav .nav-item {
                margin-right: 10px;
            }

            .navbar-brand {
                display: inline-flex;
                align-items: center;
            }

            .brand-text {
                margin-left: 3%;
                font-size: 3vh;
            }
            
            .department-logo {
                margin-left: 3%;
                width: 10vh;
            }

            .form {
                margin: auto;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                background-size: cover;
                color:white;
                background-color: transparent;
            }
           
           .yeardropdown {
               width: 15vw;
               height:5vh;
               margin-top: 20px; 
               margin-bottom: 20px; 
               border: 2px solid royalblue; 
               border-radius: 20px; 
               background-color: black; 
               color: white; 
               outline: none;
               text-align: center;
               font-size: 2vh;
           }
           
           .monthdropdown {
               width: 15vw;
               height: 5vh;
               margin-top: 20px; 
               margin-bottom: 20px; 
               border: 2px solid royalblue; 
               border-radius: 20px; 
               background-color: black; 
               color: white; 
               outline: none;
               text-align: center;
               font-size: 2vh;
           }
            
            .Hall-content {
    overflow-y: scroll;
    justify-content: center;
    align-items: center;
    height: 80%; /* Set a fixed height */
    width: 100%; /* Ensure full width */
    background-color: transparent;
}
            
            .Hall-content2 {
                justify-content: center;
                align-items: center;
            }
            
            .Hall-content::-webkit-scrollbar {
                display: none; /* Hide the scroll bar */
            }
            
            .card {
                background-color: transparent;
                width: 95%;
                border-radius: 10px;
                margin: 10px auto;
                padding: 10px;
                border-radius: 40px;
                border-color:royalblue;
            }

            .footer {
                background-color: royalblue;
                color: white;
                text-align: center;
                margin: auto;
                width: 100%;
                height: 10vh;
                position: absolute;
                bottom: 0;
                font-size: 2vh;
                padding: 1%;
            }
            
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img class="department-logo" src="Images/BirthdayCake.png">
                    <div class="brand-text">Memory Album</div>
                </div>
            </div>
        </nav>
        
        <form class="form" style="margin-top: 5%; height: 60%">
            <div class="Hall-content2" style="height:80vh; width:50%; background-color:transparent;">
                <select class="monthdropdown" id="monthSelect">
                    <option value="all">Search by Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select class="yeardropdown" id="yearSelect">
                    <option value="all">Search by Year</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            <div class="Hall-content" style="height:80%; width:100%; background-color:transparent;">
                <div id="cardContainer"></div>
            </div>
            </div>
        </form>

        <!-- Footer -->
        <div class="footer">
            <p>Happy Birthday, Gabi! Here's a gift from Monko to keep your memory album with your friends.</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullpage.js@3.1.2/dist/fullpage.min.js"></script>
        <script>         
const HallofFame = [
            { Image: "Images/Stel&Gabi1.jpg", Year: "2023", Month: "December" },
            { Image: "Images/Stel&Gabi2.jpg", Year: "2023", Month: "June" },
            { Image: "Images/Stel&Gabi3.jpg", Year: "2024", Month: "January" },
        ];

        // Function to create card HTML
        function createCard(data) {
            return `
            <div class="card">
                <br>
                <img src="${data.Image}" style="max-width: 100%; margin: auto;">
            </div>
            `;
        }

        // Function to render cards
       function renderCards(cards) {
            const cardContainer = document.getElementById('cardContainer');
            cardContainer.innerHTML = cards.map(createCard).join('');
        }

        // Call renderCards function to generate cards
        function filterCards() {
            const selectedMonth = document.getElementById('monthSelect').value.trim();
            const selectedYear = document.getElementById('yearSelect').value.trim();

            let filteredCards = HallofFame;

            if (selectedYear !== 'all') {
                filteredCards = filteredCards.filter(card => card.Year === selectedYear);
            }

            if (selectedMonth !== 'all') {
                filteredCards = filteredCards.filter(card => card.Month === selectedMonth);
            }

            renderCards(filteredCards);
        }

        // Event listener for the search input
        document.getElementById('monthSelect').addEventListener('change', filterCards);
        document.getElementById('yearSelect').addEventListener('change', filterCards);

        renderCards(HallofFame);

        </script>
    </body>
</html>