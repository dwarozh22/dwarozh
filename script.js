function validateForm() {
    const name = document.getElementById("name").value.trim();
    const mobile = document.getElementById("mobile").value.trim();
    const dob = document.getElementById("dob").value;
    const school = document.getElementById("school").value.trim();

    if (!name || !mobile || !dob || !school) {
        alert("تکایە هەموو خانەکان پڕبکەوە.");
        return false;
    }

    if (!/^07[0-9]{9}$/.test(mobile)) {
        alert("تکایە ژمارەی مۆبایل بە شێوەی دروست بنووسە (07XXXXXXXXX).");
        return false;
    }

    return true;
}
