package nov18;

//import java.util.LinkedHashSet;
import java.util.TreeSet;

public class MainApp {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		//Set->Interface->will not allowed duplicate value
		//HashSet, does not 
		//LinkedHandSet, No repeated value, 
		//TreeSet  , null value does not allowed
		TreeSet<Integer> hobj =new TreeSet<Integer>();
		hobj.add(22);
		hobj.add(67);
		hobj.add(28);
		hobj.add(87);
		hobj.add(90);
		//hobj.add(null);
		
	System.out.println(hobj);

	}

}
