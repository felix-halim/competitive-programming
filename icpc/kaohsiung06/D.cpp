#include <stdio.h>
#include <algorithm>

using namespace std;

int daysInMonth[] = { 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 };
int days[12][10000];

bool isLeapYear(int y){
	if (y<1582) return y%4==0;
	else if (y==1700) return true;
	else {
		if (y%4==0)
			if (y%100==0)
				if (y%400==0) return true;
				else return false;
			else return true;
		else return false;
	}
}

void generateCalc(){
	int acc = 0;
	for (int i=1; i<10000; i++){
		for (int j=0; j<12; j++){
			if (j!=1){
				days[j][i] = daysInMonth[j];
				if (i==1752 && j==8) days[j][i] -= 11;
			} else {
				if (isLeapYear(i))
					days[j][i] = daysInMonth[j] + 1;
				else
					days[j][i] = daysInMonth[j];
			}
			acc = (days[j][i] += acc);
		}
	}
}

int getWeekDay(int m, int y, bool first){
	const int firstWeekDay = 5;
	int mm = m - 1;
	int yy = y;
	if (first){
		mm--;
		if (mm<0) mm = 11, y--;
		return (firstWeekDay + days[mm][yy] + 1) % 7;
	} else {
		return (firstWeekDay + days[mm][yy]) % 7;
	}
}

int main(){
	freopen("pd.in","r",stdin);
	
	generateCalc();

	int w;
	scanf("%d",&w);
	while (w--){
		int m1,y1, m2,y2;
		scanf("%d %d %d %d",&y1,&m1,&y2,&m2);
		if (y1*400 + m1 > y2*400 + m2) swap(y1,y2), swap(m1,m2);

		int luckyMonth = 0, goodMonth = 0;
		while (true){
			int lastWeekDay = getWeekDay(m1,y1,false);
			int firstWeekDay = getWeekDay(m1,y1,true);
			if (lastWeekDay==0 || lastWeekDay==5 || lastWeekDay==6) luckyMonth++;
			if (firstWeekDay==0 || firstWeekDay==1 || firstWeekDay==6) goodMonth++;
			if (y1==y2 && m1==m2) break;
			m1++;
			if (m1>12) m1=1, y1++;
		}

		printf("%d %d\n", luckyMonth, goodMonth);
	}
}
