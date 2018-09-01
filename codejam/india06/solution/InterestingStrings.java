import java.util.*;
public class InterestingStrings {
	public String findSubstring(int N, int K, int L, int R){
		int[] pow2 = new int[32];
		pow2[0] = 1;
		for (int i=1; i<31; i++)
			pow2[i] = pow2[i-1]*2;
		
		if (pow2[N] <= R) return "";

		char[] ret = new char[R-L];
		for (int i=L; i<R; i++){
			for (int t=i,idx=30; ; idx--){
				if (pow2[idx]-1==t){
					ret[i-L] = (char) idx;
					break;
				} else if (pow2[idx]<=t){
					t -= pow2[idx];
				}
			}
		}

		int maxFactIdx = 0;
		long[] fact = new long[32];
		fact[0] = 1;
		for (int i=1; i<32; i++){
			fact[i] = fact[i-1]*i;
			if (fact[i] > 1000000000)
				fact[i] = Integer.MAX_VALUE;
		}

		if (K >= fact[N]) return "";

		int[] replace = new int[N];
		List<Integer> chs = new ArrayList<Integer>();
		for (int i=0; i<N; i++) chs.add(i);
		for (int i=0; i<N; i++){
			int f = (int) fact[N-i-1];
			int rem = (int) (K % fact[N-i]);
			int r = 0;
			while (rem>=f){ r++; rem -= f; }
			replace[i] = chs.get(r);
			chs.remove(r);
		}

		for (int i=L; i<R; i++)
			ret[i-L] = (char) (replace[ret[i-L]] + 'A');

		return new String(ret);
	}

	public static void main(String[] args){
		System.out.println(new InterestingStrings().findSubstring(2,1,0,3).equals("BAB"));
		System.out.println(new InterestingStrings().findSubstring(1,0,0,1).equals("A"));
		System.out.println(new InterestingStrings().findSubstring(2,0,1,3).equals("BA"));
		System.out.println(new InterestingStrings().findSubstring(4,0,7,9).equals("DA"));
		System.out.println(new InterestingStrings().findSubstring(3,1,0,7).equals("ACABACA"));
		System.out.println(new InterestingStrings().findSubstring(5,1000,99999999,100000000).equals(""));
	}
};