public class Rental {
    private String rental_name;
    private String rental_desc;
    private String availibility;
    private float price;
    private String rating;
    private int category_id;
    private int provider_id;
    private int insurance_id;
    private int company_id;


    public Rental (String rental_name, String rental_desc, String availibility, float price, String rating, int category_id, int provider_id, int insurance_id){
        this.rental_name= rental_name;
        this.rental_desc= rental_desc;
        this.availibility = availibility;
        this.price = price;
        this.rating = rating;
        this.category_id = category_id;
        this.provider_id = provider_id;
        this.insurance_id = insurance_id;
        double temp = insurance_id/3.0;
        if(temp-insurance_id/3 > 0)  this.company_id = insurance_id/3+1;
        else this.company_id=insurance_id/3;
    }


    public int getInsurance_id() {
        return insurance_id;
    }

    public String getRental_name() {
        return rental_name;
    }

    public String getRental_desc() {
        return rental_desc;
    }

    public String getAvailibility() {
        return availibility;
    }

    public float getPrice() {
        return price;
    }

    public String getRating() {
        return rating;
    }

    public int getCategory_id() {
        return category_id;
    }

    public int getProvider_id() {
        return provider_id;
    }

    public int getCompany_id() {
        return company_id;
    }

    @Override
    public String toString(){
        return "Rental: "+ rental_name + ", " + rental_desc + ", "+ availibility + ", " + price + ", " +
                rating + ", " + category_id + ", " + provider_id+ ", " + insurance_id + ", " + company_id ;
    }
}
