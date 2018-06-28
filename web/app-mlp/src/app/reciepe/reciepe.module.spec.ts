import { ReciepeModule } from './reciepe.module';

describe('ReciepeModule', () => {
  let reciepeModule: ReciepeModule;

  beforeEach(() => {
    reciepeModule = new ReciepeModule();
  });

  it('should create an instance', () => {
    expect(reciepeModule).toBeTruthy();
  });
});
