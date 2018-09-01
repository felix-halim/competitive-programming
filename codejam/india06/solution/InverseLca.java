import java.util.*;

public class InverseLca {
	public int[] getParents(String[] lca){
		int n = lca[0].split(" ").length;
		List<Set<Integer>> parents = new ArrayList<Set<Integer>>();
		for (int i=0; i<n; i++){
			parents.add(new HashSet<Integer>());
			Set<Integer> set = parents.get(i);
			for (String s : lca[i].split(" "))
				set.add(Integer.parseInt(s));
		}

		int[] ret = new int[n];
		Arrays.fill(ret,-2);

		for (int i=0; i<n; i++) parents.get(i).remove(i);
		for (int i=0; i<parents.size(); i++)
			if (parents.get(i).size()==0) ret[i] = -1;

		while (true){
			boolean finished = true;
			Set<Integer> elimParent = new HashSet<Integer>();
			for (int i=0; i<n; i++)
				if (ret[i]==-2){
					finished = false;
					if (parents.get(i).size()==1){
						ret[i] = parents.get(i).iterator().next();
						elimParent.add(ret[i]);
					}
				}
			if (finished) break;
			for (int i=0; i<n; i++)
				parents.get(i).removeAll(elimParent);
		}

		return ret;
	}

	public static void main(String[] args){
		System.out.println(Arrays.toString(new InverseLca().getParents(new String[]
			{"0 0 0", 
			 "0 1 0",
			 "0 0 2"}
		)));
		System.out.println(Arrays.toString(new InverseLca().getParents(new String[]
			{"0 0 0",
			 "0 1 1",
			 "0 1 2"}
		)));
		System.out.println(Arrays.toString(new InverseLca().getParents(new String[]
			{"0 2 2 2 4 4 2", 
			 "2 1 2 2 2 2 6", 
			 "2 2 2 2 2 2 2", 
			 "2 2 2 3 2 2 2", 
			 "4 2 2 2 4 4 2", 
			 "4 2 2 2 4 5 2", 
			 "2 6 2 2 2 2 6"}
		)));
		System.out.println(Arrays.toString(new InverseLca().getParents(new String[]
			{"0 0 0 0","0 1 0 1","0 0 2 0","0 1 0 3"}
		)));
	}
}
