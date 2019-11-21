/**
* Initialize LIFF
* @param {string} myLiffId The LIFF ID of the selected element
*/
function initializeLiff(myLiffId, messageContent) {
    document.getElementById('line').style.visibility = 'visible';
        document.getElementById('no-line').style.visibility = 'hidden';
    liff.init({
        liffId: myLiffId
    })
    document.getElementById('sendMessageButton').addEventListener('click', function() {
        liff.sendMessages([{
            'type': 'text',
            'text': messageContent
        }]);
        liff.closeWindow();
    });
}
