/**
* Initialize LIFF
* @param {string} myLiffId The LIFF ID of the selected element
*/
function initializeLiff(myLiffId, messageContent) {
    liff.init({
        liffId: myLiffId
    }).then(() => {
        document.getElementById('line').style.visibility = 'visible';
        document.getElementById('no-line').style.visibility = 'hidden';
    });
    document.getElementById('sendMessageButton').addEventListener('click', function() {
        liff.sendMessages([{
            'type': 'text',
            'text': messageContent
        }]);
        liff.closeWindow();
    });
}
