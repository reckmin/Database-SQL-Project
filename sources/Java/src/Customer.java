public class Customer {
    private  String country;
    private int user_id;

    public Customer(String country, int user_id){
        this.country=country;
        this.user_id=user_id;
    }


    public String getCountry() {
        return country;
    }

    public Integer getUser_id() {
        return user_id;
    }
    @Override
    public String toString(){
        return "Customer: "+ country + ", " + user_id;
    }

}
