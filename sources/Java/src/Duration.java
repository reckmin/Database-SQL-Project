import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

public class Duration {
   // private java.util.Date date;
    private String date;
    private String time;

    public Duration(String date, String time){
        /*DateFormat format = new SimpleDateFormat("dd/MM/yyyy", Locale.GERMAN);
        java.util.Date sqlDate=null;
        try {
            sqlDate = format.parse(date);
        } catch (ParseException e) {
            e.printStackTrace();
        }

         */
        this.date=date;
        this.time = time;
    }

    public String getDate() {return date;}

    public String getTime() {return time;}

}
