import java.util.*;
import java.io.*;

public class h_gen {
	Random r = new Random(14384);
	int rand(){ return Math.abs(r.nextInt()); }
	int lrand(int size){ return (int) Math.exp(r.nextDouble() * Math.log(size)); }
	BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(System.out));

	void kill_bf(int N, int Q, int W, int H, int maxE) throws Exception {
		assert(W>30000 && H>30000);
		bw.write(N+" "+Q+" "+W+" "+H+"\n");
		for (int i=0; i<N; i++)
			bw.write((rand()%(W+1))+" "+(rand()%(H+1))+"\n");
		for (int i=0; i<Q; i++)
			bw.write((rand()%(W+1))+" "+(rand()%(H+1))+" "+lrand(maxE)+" "+
				rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
	}

	void kill_bf_bsearch(int N, int Q, int W, int H) throws Exception {
		assert(W>30000 && H>30000);
		bw.write(N+" "+Q+" "+W+" "+H+"\n");
		for (int i=0,Xa,Ya; i<N; i++){
			switch (rand()%4){
				case 0 : Xa=W/2+(rand()%50)-25; Ya=rand()%(H+1); break;
				case 1 : Xa=rand()%(W+1); Ya=H/2+(rand()%50)-25; break;
				case 2 : Xa=rand()%(W+1); Ya=(W+H)/2-Xa; break; // diagonal 1
				case 3 : Xa=rand()%(W+1); Ya=Xa-(W-H)/2; break; // diagonal 2
				default: throw new RuntimeException("haha");
			}
			bw.write(Xa+" "+Ya+"\n");
		}
		for (int i=0; i<Q; i++)
			bw.write((W/2 + (rand()%100) - 50) + " " + 
				(H/2 + (rand()%100) - 50) + " " + (50 + lrand(100)) + " " +
				rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
	}

	void kill_bf_blocks(int N, int Q, int W, int H) throws Exception {
		assert(W>30000 && H>30000);
		bw.write(N+" "+Q+" "+W+" "+H+"\n");
		for (int i=0; i<N; i++)
			bw.write((rand()%1000) + " " + (rand()%1000) + "\n");
		for (int i=0; i<Q; i++){
			int Xa = 5000 + (rand()%(W-5000)),
				Ya = 5000 + (rand()%(H-5000)),
				Ea = Xa+Ya-2000;
			bw.write(Xa + " " + Ya + " " + Ea + " " + 
				rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
		}
	}

	// awalnya semua di (X0,Y0), pindahin semua ke 4 tempat berbeda.
	// lalu query terus di (X0,Y0) secara full.
	// jadi kalo nge flag false, bakal kena overhead traverse O(N) per query
	void kill_kd_and_quad(int N, int Q, int W, int H, int maxE) throws Exception {
		assert(W>30000 && H>30000);
		bw.write(N+" "+Q+" "+W+" "+H+"\n");

		// kd/quad tree that perform balanced indexes for initial position is useles here
		int x0 = 0, y0 = 100;
		bw.write(x0 + " " + y0 + "\n"); // person with ID = 1
		for (int i=0; i<N-1; i++)
			bw.write((rand()%10) + " " + (rand()%10) + "\n");
		
		// use person with ID = 1 to create a very skew index >:)
		// move it rightwards by one, 10000 times >:)
		for (int i=0; i<7000; i++){
			bw.write(x0+" "+y0+" 1 1 0 1 0 1 0\n");
			x0++; Q--;
		}

		// move it upwards by one, 10000 times >:)
		for (int i=0; i<8000; i++){
			bw.write(x0+" "+y0+" 1 1 0 0 0 1 1\n");
			y0++; Q--;
		}

		// let the rest of the person spread all over the place
		// it will use the pre built skew spatial indexes
		// if the kd/quad tree cannot rebalance, it will DIE >:)

		bw.write("10 10 100 "+
			rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
		Q--;

		assert(Q>20000);

		while (Q-- > 0){
			// if you use flag for node deletion, this will get you TLE >:)
			if (rand()%10==0) bw.write("10 10 100 "+
				rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
			else bw.write((rand()%(W+1))+" "+ (rand()%(H+1))+" "+lrand(maxE)+" "+
				rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+" "+rand()+"\n");
		}

		assert(Q==-1);
	}

	void sample1() throws Exception {
		bw.write("6 3 11 8\n");
		bw.write("5 4\n");
		bw.write("8 2\n");
		bw.write("4 2\n");
		bw.write("3 1\n");
		bw.write("8 2\n");
		bw.write("11 6\n");
		bw.write("1 1 4 3 7 3 1 7 3\n");
		bw.write("4 5 9 3 3 2 7 1 3\n");
		bw.write("3 1 8 5 8 8 7 3 5\n");
	}

	void sample2() throws Exception {
		bw.write("5 8 12 7\n");
		bw.write("0 2\n");
		bw.write("0 3\n");
		bw.write("5 5\n");
		bw.write("12 2\n");
		bw.write("3 1\n");
		bw.write("6 0 9 3 3 7 3 8 7\n");
		bw.write("1 1 7 4 6 9 1 3 8\n");
		bw.write("4 3 7 4 7 1 3 4 8\n");
		bw.write("1 2 5 4 7 9 3 1 4\n");
		bw.write("5 0 2 4 8 2 4 2 9\n");
		bw.write("1 0 7 1 9 3 1 4 2\n");
		bw.write("5 0 9 5 8 9 7 3 1\n");
		bw.write("3 1 3 2 9 3 8 1 3\n");
	}

	void run() throws Exception {
		bw.write("10\n");

		sample1();
		sample2();

		// kill plain brute force O(Q*N) solution
		kill_bf(20, 30000, 32497, 32503, 30000);
		kill_bf(5000, 15000, 32713, 32717, 1000);
		kill_bf(30000, 30000, 32507, 32531, 50);

		// kill brute force O(Q*N) solution that prunes using binary search
		kill_bf_bsearch(1000, 1000, 32479, 32491);
		kill_bf_bsearch(30000, 40000, 32569, 32573);

		// kill brute force O(Q*N) with spatial pruning 
		kill_bf_blocks(30000, 50000, 32569, 32573);

		// kill kd-tree with flag when deleting >:)
		kill_kd_and_quad(20000, 50000, 32533, 32537, 387);
		
		kill_bf_blocks(1000, 1000, 32561, 32563);

		//	kill_bf(10000, 10000, 32443, 32467, 100);
		//	kill_bf(10000, 10000, 32719, 32749, 100);
		//	kill_bf(10000, 10000, 32653, 32687, 100);
		//	kill_bf(10000, 10000, 32719, 32749, 100);
		//   32579  32587  32603  32609 32611  32621

		bw.close();
	}

	public static void main(String[] args) throws Exception {
		new h_gen().run();
	}
};
