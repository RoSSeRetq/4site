document.getElementById('viewAllBlock').onclick = function()
{
    document.getElementById("request-block").style.display = "block";
    document.getElementById("new-block").style.display = "none";
    document.getElementById("approve-block").style.display = "none";
    document.getElementById("tphone-block").style.display = "none";
};

document.getElementById('viewNewBlock').onclick = function()
{
    document.getElementById("request-block").style.display = "none";
    document.getElementById("new-block").style.display = "block";
    document.getElementById("approve-block").style.display = "none";
    document.getElementById("tphone-block").style.display = "none";
};

document.getElementById('viewApproveBlock').onclick = function()
{
    document.getElementById("request-block").style.display = "none";
    document.getElementById("new-block").style.display = "none";
    document.getElementById("approve-block").style.display = "block";
    document.getElementById("tphone-block").style.display = "none";
};
document.getElementById('viewTphoneBlock').onclick = function()
{
    document.getElementById("request-block").style.display = "none";
    document.getElementById("new-block").style.display = "none";
    document.getElementById("approve-block").style.display = "none";
    document.getElementById("tphone-block").style.display = "block";
};

