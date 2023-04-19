const submit = document.getElementById("submit-btn");
if(submit.length !==0){
    submit.addEventListener("click", function () {

        // Declaring Variables
        let amount = document.getElementById("amount");
        let interestRate = document.getElementById("intrest-rate");
        let duration = document.getElementById("duration");
        let csrf_token = document.getElementById("csrf-field").getAttribute("content");
        let amount_error = document.getElementById("amount-error");
        let intrest_rate_error = document.getElementById("intrest-rate-error");
        let duration_error = document.getElementById("duration-error");

        // Validation user input
        if (
            (amount.length == 0 || amount.value == "") &&
            (interestRate.length == 0 || interestRate.value == "") &&
            (duration.length == 0 || duration.value == "")
        )
        {
            amount_error.classList.add("text-red-600");
            amount_error.innerText = "Amount Cannot Be Empty";
            intrest_rate_error.classList.add("text-red-600");
            intrest_rate_error.innerText = "Interest Rate Cannot Be Empty";
            duration_error.classList.add("text-red-600");
            duration_error.innerText = "Duration Cannot Be Empty";
            return false;

        } else if (amount.length == 0 || amount.value == "") {

            amount_error.classList.add("text-red-600");
            amount_error.innerText = "Amount Cannot Be Empty";
            return false;

        } else if (interestRate.length == 0 || interestRate.value == "") {

            intrest_rate_error.classList.add("text-red-600");
            intrest_rate_error.innerText = "Interest Rate Cannot Be Empty";
            return false;

        } else if (duration.length == 0 || duration.value == "") {

            duration_error.classList.add("text-red-600");
            duration_error.innerText = "Duration Cannot Be Empty";
            return false;

        } else {

            // Ajax call to send data to php
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                // ajax response
                if (this.readyState == 4 && this.status == 200) {
                    // Getting values
                    let emi = JSON.parse(this.responseText);
                    let loan_amount = Number(amount.value);
                    let loan_interest = parseFloat(interestRate.value);
                    let loan_duration = Number(duration.value);

                    let details = '<table class="table-auto w-full"><tbody class="text-sm divide-y divide-gray-100 text-left"><tr><th class="p-2 whitespace-nowrap">Loan Amount</th><td class="p-2 whitespace-nowrap">' + '₹ ' + loan_amount + ' /-' + '</td></tr><tr><th class="p-2 whitespace-nowrap">Interest</th><td class="p-2 whitespace-nowrap">'+ loan_interest +' %' + '</td></tr><tr><th class="p-2 whitespace-nowrap">Duration (In Months)</th><td class="p-2 whitespace-nowrap">' + loan_duration + ' Months' + '</td></tr><tr><th class="p-2 whitespace-nowrap">Emi Amount</th><td class="p-2 whitespace-nowrap">' + '₹ ' + emi + ' /-'+ '</td></tr></tbody></table>'

                    // Displaying Emi amount
                    document.getElementById('responce-class').innerHTML = details;

                    let table = '<table class="table-fixed w-full"><thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50"><tr><th class="p-2 whitespace-nowrap font-semibold text-center">Payment Month</th><th class="p-2 whitespace-nowrap font-semibold text-center">Monthly EMI</th><th class="p-2 whitespace-nowrap font-semibold text-center">Interest Paid</th><th class="p-2 whitespace-nowrap font-semibold text-center">Principal Paid</th><th class="p-2 whitespace-nowrap font-semibold text-center">Balance</th></tr></thead><tbody class="text-sm divide-y divide-gray-100">';

                    for(let i=1; i <= loan_duration; i++){
                        let monthly_intrest = ( ( loan_interest / 100 ) * loan_amount) /12;
                        let principal_paid = emi - monthly_intrest;
                        loan_amount = loan_amount - principal_paid;

                        table += '<tr><td class="p-2 whitespace-nowrap text-gray-800 text-center font-medium">' + i + '</td><td class="p-2 whitespace-nowrap text-gray-800 text-center font-medium">'+ '₹ ' + emi + ' /-' +'</td><td class="p-2 whitespace-nowrap text-gray-800 text-center font-medium">' + monthly_intrest.toFixed(2) + ' %' +'</td><td class="p-2 whitespace-nowrap text-gray-800 text-center font-medium">'+ '₹ ' + principal_paid.toFixed(2) + ' /-' + '</td><td class="p-2 whitespace-nowrap text-gray-800 text-center font-medium">' + '₹ ' + loan_amount.toFixed(2) + ' /-' + '</td></tr>';
                    }
                    table += '</tbody></table>';

                    document.getElementById('responce-table').innerHTML = table;

                }
            };

            const emiCalc = {
                amount: amount.value,
                intrest: interestRate.value,
                duration: duration.value
            };

            xmlhttp.open("POST", "emi", true);
            xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.setRequestHeader("X-CSRF-Token", csrf_token);
            xmlhttp.send(JSON.stringify(emiCalc));
        }
    });
}




