
function searchProduct() {
  var input, filter, div, divs, a, i, txtValue;
  input = document.getElementById("searchProduct");
  filter = input.value.toUpperCase();
  div = document.getElementById("servicesList");
  divs = div.getElementsByClassName("col-md-4");
  for (i = 0; i < divs.length; i++) {
      a = divs[i].getElementsByTagName("h2")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          divs[i].style.display = "";
      } else {
          divs[i].style.display = "none";
      }
  }
}



document.addEventListener("DOMContentLoaded", function() {
  var texts = [
    "Gelişim Kuaför ile İmajınızı Güzelleştirir",
    "Gelişim Kuaför ile Kendinizi Şımartın ve Güzelleşin",
    "Saçlarınızda Sanat: Gelişim Kuaför ile Benzersiz Stil",
    "Gelişim Kuaför ile Kendinizi Yeniden Keşfedin ve Parlayın",
  ];

  var textElement = document.getElementById("kayanYazi");
  var index = 0;

  function showNextText() {
    textElement.textContent = texts[index];
    textElement.style.opacity = 1;

    setTimeout(function() {
      textElement.style.opacity = 0;

      index++;
      if (index >= texts.length) {
        index = 0;
      }

      setTimeout(showNextText, 1000);
    }, 4000);
  }
  
  showNextText();
});



document.addEventListener('DOMContentLoaded', function() {
  const serviceItems = document.querySelectorAll('.productItem');

  serviceItems.forEach(serviceItem => {
    const img = serviceItem.querySelector('img');

    serviceItem.addEventListener('mousemove', function(e) {
      const rect = serviceItem.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      img.style.transformOrigin = `${x}px ${y}px`;
      img.classList.add('zoom');
    });

    serviceItem.addEventListener('mouseleave', function() {
      img.classList.remove('zoom');
    });
  });
});



document.addEventListener('DOMContentLoaded', function() {
  const addCartButton = document.getElementById('addCart');
  const viewCartDiv = document.querySelector('.viewCart');

  addCartButton.addEventListener('click', function() {
    addCartButton.textContent = 'Sepete Eklendi';
    viewCartDiv.style.display = 'block';
  });
});


document.addEventListener('DOMContentLoaded', function() {
const form = document.getElementById('form');
const thankYouMessage = document.querySelector('.thankYouMessage');

form.addEventListener('submit', function(event) {
  event.preventDefault();
  thankYouMessage.style.display = 'block';
});
});


document.addEventListener('DOMContentLoaded', function() {
const serviceSelect = document.getElementById('service');
const extras = document.querySelectorAll('input[name="extra"]');
const totalAmountDiv = document.getElementById('totalAmount');

function calculateTotal() {
  let total = parseFloat(serviceSelect.value.replace(',', '.'));

  extras.forEach(extra => {
    if (extra.checked) {
      total += parseFloat(extra.value.replace(',', '.'));
    }
  });

  totalAmountDiv.textContent = `Toplam Tutar: ${total.toLocaleString('tr-TR')} TL`;
}

serviceSelect.addEventListener('change', calculateTotal);
extras.forEach(extra => extra.addEventListener('change', calculateTotal));

calculateTotal();
});


document.addEventListener('DOMContentLoaded', function() {
const characters = 'GELİSİM';
const campainCodeSpan = document.getElementById('campainCode');

function generateRandomCode() {
  let code = '';
  for (let i = 0; i < 7; i++) {
    const randomIndex = Math.floor(Math.random() * characters.length);
    code += characters[randomIndex];
  }
  const randomNumber = Math.floor(Math.random() * 90) + 10;
  code += randomNumber;
  return code;
}

campainCodeSpan.textContent = generateRandomCode();
});


document.addEventListener('DOMContentLoaded', function() {
const menuItems = document.querySelectorAll('.footerMenu .menuItem h4.dropdown');

menuItems.forEach(item => {
  item.addEventListener('click', function() {
    menuItems.forEach(item => {
      item.classList.remove('active');
    });
    this.classList.toggle('active');
    const subMenu = this.nextElementSibling;
    if (subMenu.style.display === 'flex') {
      subMenu.style.display = 'none';
      this.classList.remove('active');
    } else {
      subMenu.style.display = 'flex';
    }
  });
});
});


const counters = document.querySelectorAll('.counter')

counters.forEach((counter) => {
counter.innerHTML = '0'
const updateCounter = () => {
  const target = Number(counter.getAttribute('data-target'))
  const c = +counter.innerText
  const increment = target / 300
  if (c < target) {
    counter.innerText = `${Math.ceil(c + increment)}`
    setTimeout(updateCounter, 1)
  } else {
    counter.innerText = target
  }
}
updateCounter()
})


window.onscroll = function() {
var scrollToTopBtn = document.getElementById("scrollToTopBtn");
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.style.display = "block";
} else {
    scrollToTopBtn.style.display = "none";
}
};

function scrollToTop() {
window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* 11. Gece Modu - (Arda BALLIKAYA) */

function isDarkModeEnabled() {
  return localStorage.getItem('darkMode') === 'enabled';
}

function toggleDarkMode() {
  if (isDarkModeEnabled()) {
    localStorage.setItem('darkMode', 'disabled');
    document.body.classList.remove('dark');
  } else {
    localStorage.setItem('darkMode', 'enabled');
    document.body.classList.add('dark');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  if (isDarkModeEnabled()) {
    document.body.classList.add('dark');
  }
});

document.getElementById('toggleButton').addEventListener('click', function () {
  toggleDarkMode();
});


function isletmeDurumu() {
  var simdikiZaman = new Date();
  var saat = simdikiZaman.getHours();
  var durumElementi = document.getElementById("durum");
  
  if (saat >= 9 && saat < 18) {
      durumElementi.innerHTML = "Açık";
      durumElementi.className = "acik";
  } else {
      durumElementi.innerHTML = "Kapalı";
      durumElementi.className = "kapali";
  }
}

setInterval(isletmeDurumu, 1000);


document.addEventListener('DOMContentLoaded', function() {
  const emojItems = document.querySelectorAll('.emojItem');
  const resultElement = document.getElementById('result');

  emojItems.forEach(item => {
    item.addEventListener('click', () => {
      emojItems.forEach(el => el.classList.remove('active'));
      item.classList.add('active');
      const rating = item.getAttribute('data-rating');
      resultElement.textContent = rating;
    });
  });
});


document.querySelector('.coupanCode span').addEventListener('click', function() {
  document.querySelector('.coupanCode').classList.add('active');
  document.querySelector('.coupanInput').classList.add('active');
});
  

document.getElementById('submitButton').addEventListener('click', function(event) {
  event.preventDefault();
  document.querySelector('.errorText').classList.add('active');
});