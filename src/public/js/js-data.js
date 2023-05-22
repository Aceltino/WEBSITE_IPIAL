

let data = new Date();
function formatarData(data){
    let newDate = new Date(data);
    return `${newDate.getDate()}/${newDate.getMonth()+1}/${newDate.getFullYear()}`;
}

console.log(formatarData(data));