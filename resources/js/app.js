import IMask from 'imask';
import Alert from 'bootstrap/js/dist/alert';

const element = document.getElementById('published');

if(element) {
    IMask(element, {
        mask: Date
    })
}

const alertList = document.querySelectorAll('.alert')
alertList.forEach(alert => {
    new Alert(alert)
})
