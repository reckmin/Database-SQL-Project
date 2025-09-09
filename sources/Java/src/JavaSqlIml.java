import java.nio.file.Files;
import java.nio.file.Path;
import java.sql.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.*;
import java.io.*;
import java.util.stream.Collectors;
import java.util.Map;
import java.util.HashMap;
import java.util.Map.*;


public class JavaSqlIml {

    public static void main(String args[]) {
        try {
            // Loads the class "oracle.jdbc.driver.OracleDriver" into the memory
            Class.forName("oracle.jdbc.driver.OracleDriver");

            // Connection details
            String database = "jdbc:oracle:thin:@oracle19.cs.univie.ac.at:1521:orclcdb";
            String user = "a11826575";
            String pass = "dbs22";

            // Establish a connection to the database
            Connection con = DriverManager.getConnection(database, user, pass);
            Statement stmt = con.createStatement();


            String current = System.getProperty("user.dir").concat("/data/");
            System.out.println("Current working directory in Java : " + current);


            LinkedList<String> result = new LinkedList<>();

            // inserting data into rentalwebsite
            result.add("INSERT INTO RENTALWEBSITE VALUES (1, 'RentYourDream', 'rentyourdream@gmail.com')");


            //collecting data for WEBUSER
            Path path1 = Path.of(current,  "WebUser.csv");

            Vector <WebUser> webuserData =  Files.lines(path1)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new WebUser(fields[0], Integer.parseInt(fields[1]), fields[2], fields[3], fields[4]);
                    }).collect(Collectors.toCollection(Vector::new));

           for(WebUser w : webuserData) {
               result.add("INSERT INTO WEBUSER (full_name, age, gender, email, phone_number, website_id) VALUES " +
                       " ('" +w.full_name + "', '" + w.age + "', '" + w.gender + "', '"
                       + w.email + "', '" + w.phone_number + "', '1')");

           }


           //collecting data for Customer
            Path path2 = Path.of(current,  "Customer.csv");

            Vector <Customer> customerData =  Files.lines(path2)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Customer(fields[0], Integer.parseInt(fields[1]));
                    }).collect(Collectors.toCollection(Vector::new));

            for(Customer cus : customerData){
               result.add("INSERT INTO Customer (country, user_id) VALUES ('" + cus.getCountry() + "', '"+ cus.getUser_id() + "')");
           }


            //collecting data for RentalProvide
            Path path3 = Path.of(current,  "RentalProvider.csv");

            Vector <RentalProvider> providerData =  Files.lines(path3)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new RentalProvider(fields[0], Integer.parseInt(fields[1]));
                    }).collect(Collectors.toCollection(Vector::new));

            for(RentalProvider pr : providerData){
                result.add("INSERT INTO Rental_provider (licence, user_id) VALUES ('" + pr.getLicence() + "', '"+ pr.getUser_id() + "')");
            }


            //collecting data for Category
            Path path4 = Path.of(current,  "RentalCategory.csv");

            Vector <Category>categoryData =  Files.lines(path4)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Category(Integer.parseInt(fields[0]), fields[1] );
                    }).collect(Collectors.toCollection(Vector::new));

            for(Category cat : categoryData){
                result.add("INSERT INTO RENTALCATEGORY (main_category_id, category_name) VALUES ('" + cat.getMainCat() + "', '"+ cat.getCategory_name() + "')");
            }


            //collecting data for insurance company
            Path path5 = Path.of(current,  "InsuranceCompany.csv");

            Vector <ICompany> icompanyData =  Files.lines(path5)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new ICompany(fields[0] );
                    }).collect(Collectors.toCollection(Vector::new));

            for(ICompany ic : icompanyData){
                result.add("INSERT INTO INSURANCECOMPANY (company_name) VALUES ('" + ic.getName()+ "')");
            }


            //collecting data for Insurance
            Path path6 = Path.of(current,  "Insurance.csv");

            Vector <Insurance> insuranceData =  Files.lines(path6)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Insurance(fields[0],  Integer.parseInt(fields[1]) );
                    }).collect(Collectors.toCollection(Vector::new));

            for(Insurance i : insuranceData){
                result.add("INSERT INTO INSURANCE (insurance_type, company_id) VALUES ('" + i.getIntype()+ "', '"+ i.getCompany_id() +"')");
            }


            //collecting data for Rental
            Path path7 = Path.of(current,  "Rental.csv");

            Vector <Rental> rentalData =  Files.lines(path7)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Rental(fields[0], fields[1] ,fields[2], Float.parseFloat(fields[3]), fields[4], Integer.parseInt(fields[5]),
                                Integer.parseInt(fields[6]),  Integer.parseInt(fields[7]));
                    }).collect(Collectors.toCollection(Vector::new));

            for(Rental r : rentalData){
                result.add("INSERT INTO RENTAL (rental_name, rental_description, availibility, price, rating, category_id, " +
                        "provider_id, insurance_id, company_id) VALUES ('" + r.getRental_name() + "', '"+ r.getRental_desc() + "', '"
                        + r.getAvailibility() + "', '"+ r.getPrice()+ "', '"+ r.getRating()+ "', '"+ r.getCategory_id() + "', '"+ r.getProvider_id() + "', '"
                        + r.getInsurance_id()+ "', '"+ r.getCompany_id() +"')");
            }


            //calculating amount of rented items
            Vector<Integer> notavRent = new Vector<>();
            Map <String, Integer> rentObj = new LinkedHashMap<>();
            int index=0;
            int cars=0, apartments=0, malls=0;
            for(Rental w :rentalData){
                index++;
               if(w.getAvailibility().equals("NOT AVAILABLE")) {
                   notavRent.add(index);
                   //System.out.println(index);
                   if(w.getCategory_id()==6) rentObj.put("Cars",++cars);
                   if(w.getCategory_id()==5) rentObj.put("Apartment",++apartments);
                   if(w.getCategory_id()==7) rentObj.put("Malls",++malls);
               }
            }
            //System.out.println(notavRent.size());

            /*
            for(Map.Entry<String, Integer> w :rentObj.entrySet()){
                System.out.println(w.getKey()+"  "+w.getValue() );
            }*/


            //collecting data for Contract
            Path path8 = Path.of(current,  "Contract.csv");

            Vector <Contract> contractData =  Files.lines(path8)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Contract(fields[0], Float.parseFloat(fields[1]), Integer.parseInt(fields[2]), Integer.parseInt(fields[3]));
                    }).collect(Collectors.toCollection(Vector::new));

            for(Contract cont : contractData){
                result.add("INSERT INTO CONTRACT (contract_name, contract_price, customer_id, provider_id) VALUES ('" + cont.getContract_name()+ "', '"+ cont.getContract_price()
                        + "', '"+ cont.getCustomer_id() + "', '"+ cont.getProvider_id() +"')");
            }


            //collecting data for Includes
            int  contract_id = 0;
            for(Integer in : notavRent){
                result.add("INSERT INTO INCLUDES (rental_id, contract_id) VALUES ('" + in + "', '"+ ++contract_id +"')");
            }


            //collecting data for DurationOfRental
            Path path9 = Path.of(current,  "DurationOfRental.csv");
            DateFormat date =  new SimpleDateFormat("dd/MM/yyy", Locale.GERMAN);
            Vector <Duration> durationData =  Files.lines(path9)
                    .skip(1)
                    .map(line -> {
                        String[] fields = line.split(",");
                        return new Duration(fields[0], fields[1]);
                    }).collect(Collectors.toCollection(Vector::new));

            int contract_idd = 0;

            for(Duration d: durationData){
                result.add("INSERT INTO DURATIONOFRENTAL (d_date, d_time, rental_id, contract_id) VALUES (to_date('"+ d.getDate()+ "', 'dd-mm-yyyy')"+ ", '" +
                         d.getTime()  + "', '"+ notavRent.get(contract_idd) + "', '"+ ++contract_idd +"')");
            }



            while(result.size()>0){
               try{
                   String str = result.poll();
                   stmt.executeUpdate(str);
               }
               catch (Exception e){
                   System.out.println("Error input"+ e.getMessage());
               }
           }


            // Check number of datasets in tables
            ResultSet rs1 = stmt.executeQuery("SELECT COUNT(*) FROM WEBUSER");
            if (rs1.next()) {
                int count = rs1.getInt(1);
                System.out.println("Number of datasets in WebUser: " + count);
            }

            ResultSet rs2 = stmt.executeQuery("SELECT COUNT(*) FROM CUSTOMER");
            if (rs2.next()) {
                int count = rs2.getInt(1);
                System.out.println("Number of datasets in Customer: " + count);
            }

            ResultSet rs3 = stmt.executeQuery("SELECT COUNT(*) FROM RENTAL_PROVIDER");
            if (rs3.next()) {
                int count = rs3.getInt(1);
                System.out.println("Number of datasets in RentalProvider: " + count);
            }

            ResultSet rs4 = stmt.executeQuery("SELECT COUNT(*) FROM RENTALCATEGORY");
            if (rs4.next()) {
                int count = rs4.getInt(1);
                System.out.println("Number of datasets in RentalCategory: " + count);
            }

            ResultSet rs5 = stmt.executeQuery("SELECT COUNT(*) FROM RENTAL");
            if (rs5.next()) {
                int count = rs5.getInt(1);
                System.out.println("Number of datasets in Rental: " + count);
            }

            ResultSet rs6 = stmt.executeQuery("SELECT COUNT(*) FROM INSURANCECOMPANY");
            if (rs6.next()) {
                int count = rs6.getInt(1);
                System.out.println("Number of datasets in InsuranceCompany: " + count);
            }

            ResultSet rs7 = stmt.executeQuery("SELECT COUNT(*) FROM INSURANCE");
            if (rs7.next()) {
                int count = rs7.getInt(1);
                System.out.println("Number of datasets in Insurance: " + count);
            }

            ResultSet rs8 = stmt.executeQuery("SELECT COUNT(*) FROM CONTRACT");
            if (rs8.next()) {
                int count = rs8.getInt(1);
                System.out.println("Number of datasets in Contract: " + count);
            }

            ResultSet rs9 = stmt.executeQuery("SELECT COUNT(*) FROM INCLUDES");
            if (rs9.next()) {
                int count = rs9.getInt(1);
                System.out.println("Number of datasets in Includes: " + count);
            }

            ResultSet rs10 = stmt.executeQuery("SELECT COUNT(*) FROM DURATIONOFRENTAL");
            if (rs10.next()) {
                int count = rs10.getInt(1);
                System.out.println("Number of datasets in DurationOfRental: " + count);
            }


            // Clean up connections
            rs1.close();
            stmt.close();
            con.close();
        } catch (Exception e) {
            System.err.println(e.toString());
        }

    }
}