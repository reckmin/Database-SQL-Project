public class Insurance {
    private String intype;
    private int company_id;

    public Insurance (String intype, int company_id){
        this.intype=intype;
        this.company_id=company_id;
    }

    public int getCompany_id() {
        return company_id;
    }

    public String getIntype(){
        return intype;
    }


    @Override
    public String toString(){
        return "Insurance: "+ intype + ", " + company_id;
    }
}
