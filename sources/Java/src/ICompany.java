public class ICompany {
    private String name;
    public ICompany(String name){
        this.name=name;
    }

    public String getName(){
        return name;
    }

    @Override
    public String toString(){
        return "InsuranceCompany: "+ name ;
    }
}
