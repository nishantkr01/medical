async function getCovidapi(){
    try{
    const jsondata = await fetch('https://api.covid19api.com/summary');
    const jsdata = await jsondata.json();
    const country_name = jsdata.Countries[76];

    const dataDom = document.getElementById('dataDom');
    dataDom.innerHTML = `<tbody class="thead-light" id="dataDom">
    <tr>
      <td>${country_name.Country}</td>
      <td>${country_name.TotalConfirmed}</td>
      <td>${country_name.TotalDeaths}</td>
      <td>${country_name.TotalRecovered}</td>
    </tr>
    </tr>
  </tbody>`;
    console.log(country_name);

    }catch(e){
        console.log("Error : "+e)
    }
}
getCovidapi();