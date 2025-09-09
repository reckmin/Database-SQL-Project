public class RentalProvider {
    private String licence;
    private int user_id;

    public RentalProvider(String licence, int user_id){
        this.licence=licence;
        this.user_id=user_id;
    }

    public String getLicence() {
        return licence;
    }

    public Integer getUser_id() {
        return user_id;
    }
    @Override
    public String toString(){
        return "RentalProvider: "+ licence + ", " + user_id;
    }

}
