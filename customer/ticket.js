function showTimes(date) {
    const showtimeButtons = document.getElementById('showtime-buttons-1');
    showtimeButtons.innerHTML = ''; // 清空原有的時段按鈕

    const showtimes = {
        '2024-06-14': ['10:00', '13:00', '16:00'],
        '2024-06-15': ['10:30', '13:30', '16:30'],
        '2024-06-16': ['11:00', '14:00', '17:00'],
        '2024-06-17': ['11:30', '14:30', '17:30']
    };

    showtimes[date].forEach(time => {
        const button = document.createElement('button');
        button.innerText = time;
        button.onclick = () => bookTicket();
        showtimeButtons.appendChild(button);
    });
}


//讓按鈕顏色保持直到點其他按鈕
let previousButton = null;

document.querySelectorAll('.date-selection button').forEach(button => {
    button.addEventListener('click', function() {
        if (previousButton !== null) {
            previousButton.style.backgroundColor = '';
        }
        this.style.backgroundColor = '#a5dbfc';
        previousButton = this;
    });
});

