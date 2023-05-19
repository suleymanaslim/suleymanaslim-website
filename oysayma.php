<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oy Takip Sitesi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <style>
    .image-frame {
      width: 100%;
      height: auto;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .counter {
      width: 100%;
      font-size: 14px;
    }

    .reset {
      background-color: white;
      color: black;
      border: 1px solid black;
    }
    .decrease,
    .increase {
      border-radius: 50%;
      width: 35px;
      height: 35px;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .decrease {
      margin-right: -1px;
    }

    .increase {
      margin-left: -1px;
    }

    .counter {
      width: 50px;
      text-align: center;
    }

    .btn-circle {
      border-radius: 50%;
      padding: .5rem .75rem;
      font-size: 1.5rem;
      line-height: 1.25;
    }

    .btn-outline-primary {
      color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-outline-primary:hover {
      color: #fff;
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <h2 id="recep-tayyip-erdogan-header">Recep Tayyip Erdoğan</h2>
        <div class="image-frame">
          <img src="Recep-Tayyip-Erdogan.png" alt="Recep Tayyip Erdoğan" class="image-frame">
        </div>
        <div class="mt-3">
          <h3>Sayaç</h3>
          <div class="input-group">
            <button class="btn btn-primary decrease">-</button>
            <input type="text" class="form-control counter" value="0" readonly>
            <button class="btn btn-primary increase">+</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h2 id="kemal-kilicdaroglu-header">Kemal Kılıçdaroğlu</h2>
        <div class="image-frame">
          <img src="kemal-kilicdaroglu.png" alt="Kemal Kılıçdaroğlu" class="image-frame">
        </div>
        <div class="mt-3">
          <h3>Sayaç</h3>
          <div class="input-group">
            <button class="btn btn-primary decrease">-</button>
            <input type="text" class="form-control counter" value="0" readonly>
            <button class="btn btn-primary increase">+</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <button class="btn btn-primary reset">Sıfırla</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      var decreaseButtons = document.getElementsByClassName('decrease');
      var increaseButtons = document.getElementsByClassName('increase');
      var counters = document.getElementsByClassName('counter');
      var resetButton = document.querySelector('.reset');

      for (var i = 0; i < decreaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', function() {
          var counter = this.parentNode.querySelector('.counter');
          var value = parseInt(counter.value);
          if (value > 0) {
            counter.value = value - 1;
            saveCounterValue(counter);
          }
        });
      }

      for (var i = 0; i < increaseButtons.length; i++) {
        increaseButtons[i].addEventListener('click', function() {
          var counter = this.parentNode.querySelector('.counter');
          var value = parseInt(counter.value);
          counter.value = value + 1;
          saveCounterValue(counter);
        });
      }

      function saveCounterValue(counter) {
        var header = counter.closest('.col-md-6').querySelector('h2').id;
        var value = counter.value;
        localStorage.setItem(header, value);
      }

      for (var i = 0; i < counters.length; i++) {
        var header = counters[i].closest('.col-md-6').querySelector('h2').id;
        var value = localStorage.getItem(header);
        if (value !== null) {
          counters[i].value = value;
        }
      }

      resetButton.addEventListener('click', function() {
        for (var i = 0; i < counters.length; i++) {
          var header = counters[i].closest('.col-md-6').querySelector('h2').id;
          localStorage.removeItem(header);
          counters[i].value = "0";
        }
      });
  </script>
  <footer style="text-align: center; padding-top: 20px;">
  Created by <a href="https://instagram.com/slymnaslm" target="_blank">Süleyman Aslım</a> <br>
  <a href="/">Ana Sayfa</a>
  </footer>
</body>
</html>