function convert_number(number)
{
    if ((number < 0) || (number > 999999999)) 
    { 
        return "NUMBER OUT OF RANGE!";
    }
    var Gn = Math.floor(number / 1000000000);  /* Billions */ 
    number -= Gn * 1000000000; 
    var kn = Math.floor(number / 1000000);     /* Millions */ 
    number -= kn * 1000000; 
    var Hn = Math.floor(number / 1000);        /* Thousands */ 
    number -= Hn * 1000; 
    var Dn = Math.floor(number / 100);         /* Tens (deca) */ 
    number = number % 100;                     /* Ones */ 
    var tn= Math.floor(number / 10); 
    var one=Math.floor(number % 10); 
    var res = ""; 

    if (Gn>0) 
    { 
        res += (((res=="") ? "" : " ") + 
            convert_number(Gn) + " BILLION"); 
    } 
    if (kn>0) 
    { 
        res += (((res=="") ? "" : " ") + 
            convert_number(kn) + " MILLION"); 
    } 
    if (Hn>0) 
    { 
        res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " THOUSAND"); 
    } 

    if (Dn) 
    { 
        res += (((res=="") ? "" : " ") + 
            convert_number(Dn) + " HUNDRED"); 
    } 

    var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
    var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

    if (tn>0 || one>0) 
    { 
        if (!(res=="")) 
        { 
            res += " AND "; 
        } 
        if (tn < 2) 
        { 
            res += ones[tn * 10 + one]; 
        } 
        else 
        { 
            res += tens[tn];
            if (one>0) 
            { 
                res += ("-" + ones[one]); 
            } 
        } 
    }

    if (res=="")
    { 
        res = "0"; 
    } 
    return res;
}