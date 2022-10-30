// fetch('http://localhost/ad/goalFootball/v3_plus_DB/database/todayLeader.php')
// fetch('http://localhost/ad/goalFootball/v3_plus_DB/database/tournamentLeader.php')
// .then(res => res.json())
// .then(data => {
//   data.forEach(element => {
//     console.log(`name: ${element.NAME} Goal: ${element.GOAL}`);
//   });
// })

tbodyHtml = '';
rank = 1;
fetch('http://localhost/ad/goalFootball/v3_plus_DB/database/todayLeader.php')
  .then(res => res.json())
  .then(data => {
    data.forEach(element => {
      // console.log(`name: ${element.NAME} Goal: ${element.GOAL}`);
      // <td>${element.NAME}</td>
      tbodyHtml +=`<tr>
        <td>${rank++}</td>
        <td>${element.NAME}</td>
        <td>${element.AGE}</td>
        <td>*-${element.MOBILE.slice(-6)}</td>
        <td>${element.GOAL}</td>
      </tr>`
    });
    document.querySelector('#tbodyAdd').innerHTML = tbodyHtml;
  })